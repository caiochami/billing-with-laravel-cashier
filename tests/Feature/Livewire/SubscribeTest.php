<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\Subscribe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SubscribeTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(Subscribe::class);

        $component->assertStatus(200);
    }
}
