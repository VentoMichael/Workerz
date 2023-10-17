<?php

namespace App\Http\Livewire;

use App\Models\Plan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Cashier;
use Livewire\Component;

class BillingHistory extends Component
{
    public $showFullHistory = false;

    public function toggleShowFullHistory()
    {
        $this->showFullHistory = !$this->showFullHistory;
    }

    public function render()
    {
        $invoiceData = $this->showFullHistory ? $this->getFullBillingHistory() : $this->getLimitedBillingHistory();

        return view('livewire.billing-history', ['invoiceData' => $invoiceData]);
    }

    private function getLimitedBillingHistory()
    {

        $invoiceData = [];
        $invoices = Auth::user()->invoices()->sortByDesc('created_at')->take(3);
        foreach ($invoices as $subscription) {
            foreach ($subscription->lines->data as $invoice) {
                if ($invoice->object === 'line_item' && $invoice->type === 'subscription') {
                    $description = $invoice->description;
                    $matches = [];
                    $name = $description;
                    if (preg_match('/(\d+ × )?(.*?) \(/', $description, $matches)) {
                        $name = trim($matches[2]);
                    }
                    $invoiceData[] = [
                        'date' => date('d-m-Y', $invoice->created),
                        'name' => $name,
                        'interval' => $invoice->plan->interval === 'month' ? 'Monthly' : 'Yearly',
                        'total' => $subscription->amount_due / 100,
                        'invoice_pdf' => $subscription->invoice_pdf,
                    ];
                }
            }
        }
        return $invoiceData;
    }

    private function getFullBillingHistory()
    {

        $invoiceData = [];
        $invoices = Auth::user()->invoices()->all();
        foreach ($invoices as $subscription) {
            foreach ($subscription->lines->data as $invoice) {
                if ($invoice->object === 'line_item' && $invoice->type === 'subscription') {
                    $description = $invoice->description;
                    $matches = [];
                    $name = $description;

                    // Extract the name using regular expression
                    if (preg_match('/(\d+ × )?(.*?) \(/', $description, $matches)) {
                        $name = trim($matches[2]);
                    }
                    $invoiceData[] = [
                        'date' => date('d-m-Y', $invoice->created),
                        'name' => $name,
                        'interval' => $invoice->plan->interval === 'month' ? 'Monthly' : 'Yearly',
                        'total' => $subscription->amount_due / 100,
                        'invoice_pdf' => $invoice->invoice_pdf,
                    ];
                }
            }
        }
        return $invoiceData;
    }
}
