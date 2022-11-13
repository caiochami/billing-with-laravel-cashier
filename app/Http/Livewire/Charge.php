<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class Charge extends Component
{
    public User $user;

    public int $amount = 100;

    public array $products = [];

    protected array $rules = [
        'amount' => ['required', 'integer', 'min:1']
    ];

    public function charge(string $paymentMethodId): void
    {
        $this->validate();

        $this->user->createOrGetStripeCustomer();

        $this->user->updateDefaultPaymentMethod($paymentMethodId);

        $this->user->charge($this->amount, $paymentMethodId);

        $this->user->invoiceFor('Single Charge', $this->amount);

        Cache::forget("users:{$this->user->id}:invoices");

        $this->redirectRoute('dashboard');
    }
}
