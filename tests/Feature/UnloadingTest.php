<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UnloadingTest extends TestCase
{
    public function test_index_status_success(): void
    {
        $response = $this->get(route('unloading'));

        $response->assertStatus(200);
    }

    public function test_store_status_success(): void
    {
        $data = [
            'name' => 'Kate',
            'phone' => 8888888,
            'email' => 'kate@ya.ru',
            'description' => 'SomeDescription'
        ];

        $response = $this->post(route('unloading.store'), $data);
        $response->assertStatus(200);
    }

    public function test_view_feedback_success(): void
    {
        $response = $this->post(route('unloading.store'));
        $response->assertViewIs('forms.unloadingLoaded');
    }
}
