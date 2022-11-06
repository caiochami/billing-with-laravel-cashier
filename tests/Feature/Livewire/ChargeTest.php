<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\Charge;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ChargeTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(Charge::class);

        $component->assertStatus(200);
    }
}
