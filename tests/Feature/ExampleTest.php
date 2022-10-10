<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Tests\TestCase;
use App\Models\Event;

class ExampleTest extends TestCase
{
    public function testWarmupEvents() {
        $response = $this->get('/warmupevents');
        $response->assertStatus(200);
    }

    public function testEvents() {
        $response = $this->get('/events');
        $response->assertStatus(200);
    }

    public function testFutureEvents() {
        $response = $this->get('/futureevents');
        $response->assertStatus(200);
    }

    public function testMenu() {
        $response = $this->get('/menu');
        $response->assertStatus(200);
    }
}
