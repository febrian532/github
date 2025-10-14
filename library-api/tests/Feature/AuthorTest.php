<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_author()
    {
        $response = $this->postJson('/api/authors', [
            'name' => 'John Doe',
            'bio' => 'Writer',
            'birth_date' => '1990-01-01'
        ]);

        $response->assertStatus(201)
                 ->assertJsonFragment(['name' => 'John Doe']);
    }

    public function test_can_get_authors()
    {
        Author::factory()->create(['name' => 'Jane Doe']);

        $response = $this->getJson('/api/authors');
        $response->assertStatus(200)
                 ->assertJsonFragment(['name' => 'Jane Doe']);
    }
}
