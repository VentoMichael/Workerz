<?php

namespace App\Http\Livewire;

use App\Models\Plan;
use LivewireUI\Modal\ModalComponent;

class ChangePlans extends ModalComponent
{
    protected $rules = [
        'plan' => 'required',
    ];
    public $plan;
    public $clearProperty;
    public $successMessage;
    public $annualBilling = false;

    public function submitForm(){

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
        $this->emit('closeModal');
        $this->clearProperty = 'successMessage';
        $this->successMessage = 'We received your message successfully and will get back to you shortly!';
        $this->emit('productDataUpdated', session('productSelected'));


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
        return view('livewire.change-plans',compact('plans'));
    }
}
