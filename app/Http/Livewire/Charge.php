<?php

namespace App\Http\Livewire;

use App\Models\User;
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

        $this->user->charge($this->amount, $paymentMethodId);

        $this->redirectRoute('dashboard');
    }
}
