<?php

namespace App\Http\Livewire\Invoices;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class DataTable extends Component
{
    public User $user;

    public function render()
    {
        $invoices = Cache::remember(
            "users:{$this->user->id}:invoices",
            now()->addHour(),
            fn () => $this->user->invoices()
        );

        return view('livewire.invoices.data-table', compact('invoices'));
    }
}
