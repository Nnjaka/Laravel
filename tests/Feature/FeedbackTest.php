<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class FeedbackTest extends TestCase
{
    public function test_index_status_success(): void
    {
        $response = $this->get(route('feedback'));

        $response->assertStatus(200);
    }

    public function test_store_status_success(): void
    {
        $data = [
            'name' => 'Kate',
            'description' => 'SomeDescription'
        ];

        $response = $this->post(route('feedback.store'), $data);
        $response->assertStatus(200);
    }

    public function test_view_feedback_success(): void
    {
        $response = $this->post(route('feedback.store'));
        $response->assertViewIs('forms.feedbackLoaded');
    }
}
