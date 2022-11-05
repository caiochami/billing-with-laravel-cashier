<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;

class Subscribe extends Component
{
    use Actions;

    public User $user;

    public string $priceId = '';

    public array $products = [];

    protected array $rules = [
        'priceId' => ['required', 'string']
    ];

    public function mount(): void
    {
        $this->products = config('stripe.products');

        $this->priceId = data_get($this->products, '0.prices.0.price_id');
    }

    public function subscribe(string $paymentMethod): void
    {
        $this->validate();

        $this->user->newSubscription('cashier', $this->priceId)->create($paymentMethod);

        $this->redirectRoute('members.index');
    }

    public function render()
    {
        $intent = $this->user->createSetupIntent();

        return view('livewire.subscribe', compact('intent'));
    }
}
