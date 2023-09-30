<?php

namespace App\Http\Livewire;

use App\Models\Plan;
use Exception;
use LivewireUI\Modal\ModalComponent;

class ChangePlans extends ModalComponent
{
    protected $rules = [
        'plan' => 'required',
    ];
    public $plan;
    public $clearProperty;
    public $successMessage;
    public $errorMessage;
    public $annualBilling = false;

    public function submitForm()
    {
        try {
            $products = Plan::all();
            foreach ($products as $product) {
                if ($this->plan === $product['name']) {
                    $newProductData = [
                        'product' => $product,
                        'paymentYearly' => $this->annualBilling,
                    ];
                    session(['productSelected' => $newProductData]);
                }
            }
            $this->dispatch('closeModal');
            $this->clearProperty = 'successMessage';
            $this->successMessage = 'We received your message successfully and will get back to you shortly!';
            $this->dispatch('productDataUpdated', session('productSelected'));
        } catch (Exception $e) {
            $this->clearProperty = 'errorMessage';
            $this->errorMessage = 'There is an error, please try again later.';
        }

    }

    public function clearMessage($property)
    {
        $this->$property = null;
    }

    public function toggleAnnualBilling()
    {
        $this->annualBilling = !$this->annualBilling;
    }

    public function render()
    {
        $plans = Plan::all();
        sleep(1);
        return view('livewire.change-plans', compact('plans'));
    }
}
