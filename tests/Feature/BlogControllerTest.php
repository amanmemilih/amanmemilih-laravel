<?php

namespace Tests\Feature;

use App\Models\Blog;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class BlogControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function test_index_returns_blogs_when_data_exists()
    {
        // Create test blog data
        $blog = Blog::factory()->create([
            'title' => 'Test Blog',
            'body' => 'Test Content',
            'thumbnail' => 'test.jpg',
        ]);

        $response = $this->getJson('/api/blogs');
        
        echo "\nTest: index_returns_blogs_when_data_exists\n";
        echo "Response JSON:\n";
        echo json_encode($response->json(), JSON_PRETTY_PRINT) . "\n";

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Blog successfully retrieved',
                'data' => [
                    [
                        'id' => $blog->id,
                        'title' => 'Test Blog',
                        'body' => 'Test Content',
                        'thumbnail' => asset('storage/blogs/test.jpg'),
                        'created_at' => $blog->created_at->toJSON(),
                    ]
                ]
            ]);
    }

    public function test_index_returns_404_when_no_blogs_exist()
    {
        // Delete all blogs first to test empty state
        Blog::truncate();
        
        $response = $this->getJson('/api/blogs');

        echo "\nTest: index_returns_404_when_no_blogs_exist\n";
        echo "Response JSON:\n";
        echo json_encode($response->json(), JSON_PRETTY_PRINT) . "\n";

        $response->assertStatus(404)
            ->assertJson([
                'code' => 404,
                'success' => false,
                'message' => 'No blogs found',
            ]);
    }

    public function test_destroy_returns_404_when_blog_not_found()
    {
        $response = $this->deleteJson('/api/blogs/999');

        echo "\nTest: destroy_returns_404_when_blog_not_found\n";
        echo "Response JSON:\n";
        echo json_encode($response->json(), JSON_PRETTY_PRINT) . "\n";

        $response->assertStatus(404)
            ->assertJson([
                'code' => 404,
                'success' => false,
                'message' => 'Blog not found',
            ]);
    }

    public function test_destroy_successfully_deletes_blog()
    {
        $blog = Blog::factory()->create();

        $response = $this->deleteJson("/api/blogs/{$blog->id}");

        echo "\nTest: destroy_successfully_deletes_blog\n";
        echo "Response JSON:\n";
        echo json_encode($response->json(), JSON_PRETTY_PRINT) . "\n";

        $response->assertStatus(200)
            ->assertJson([
                'code' => 200,
                'success' => true,
                'message' => 'Blog successfully deleted',
            ]);

        $this->assertDatabaseMissing('blogs', ['id' => $blog->id]);
    }
} 