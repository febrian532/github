namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_book()
    {
        $author = Author::factory()->create();

        $response = $this->postJson('/api/books', [
            'title' => 'Laravel Basics',
            'description' => 'A beginner guide',
            'publish_date' => '2020-10-10',
            'author_id' => $author->id
        ]);

        $response->assertStatus(201)
                 ->assertJsonFragment(['title' => 'Laravel Basics']);
    }

    public function test_can_get_books()
    {
        $book = Book::factory()->create(['title' => 'My Book']);

        $response = $this->getJson('/api/books');
        $response->assertStatus(200)
                 ->assertJsonFragment(['title' => 'My Book']);
    }
}