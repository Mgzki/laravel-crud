<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_submit_post()
    {
        // Route::post('/posts', [PostsController::class, 'store']);

        $this->post('/posts', [
                'title' => 'Test Title',
                'content' => 'Test Content',
            ])
            ->assertRedirect('/posts')
            ->assertSessionHas('success');

        $this->assertDatabaseHas('posts', [
            'id' => 1,
            'title' => 'Test Title',
            'content' => 'Test Content',
            'slug' => 'test-title',
        ]);
    }
}
