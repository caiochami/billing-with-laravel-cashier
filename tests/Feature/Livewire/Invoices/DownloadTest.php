<?php

namespace Tests\Feature\Livewire\Invoices;

use App\Http\Livewire\Invoices\Download;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class DownloadTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(Download::class);

        $component->assertStatus(200);
    }
}
