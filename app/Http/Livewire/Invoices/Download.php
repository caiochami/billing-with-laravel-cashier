<?php

namespace App\Http\Livewire\Invoices;

use App\Models\User;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Response;

class Download extends Component
{
    protected $listeners = ['downloadInvoice'];

    public User $user;

    public function downloadInvoice(string $invoiceId): Response
    {
        return $this->user->downloadInvoice($invoiceId);
    }

    public function render()
    {
        return view('livewire.invoices.download');
    }
}
