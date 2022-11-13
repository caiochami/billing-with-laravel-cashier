<?php

namespace Tests\Feature\Livewire\Invoices;

use App\Http\Livewire\Invoices\DataTable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class DataTableTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(DataTable::class);

        $component->assertStatus(200);
    }
}
