<?php

namespace Tests\Feature;

use App\Models\News;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

class ManageNewsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Testing news store method
     * @return void
     */
    public function test_create_news()
    {

        $newsData = [
            "title" => "New news title",
            "content" => "New news content"
        ];

        // acting 
        $this->json('POST', 'api/news', $newsData, ['Accept' => 'application/json'])
            ->assertStatus(201)
            ->assertJsonStructure([
                "success",
                "message"
            ])
            ->assertJson([
                "success" => true,
                "message" => 'News record successfully created!'
            ]);
    }

    /**
     * Testing news view method
     * @return void
     */
    public function test_news_view()
    {
        // Given data

        $row = News::factory()->create([
            "title" => "New news title",
            "content" => "New news content"
        ]);
        // acting 
        $this->json('GET', 'api/news/'. $row->id, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                "success",
                "data"
            ])
            ->assertJson([
                "success" => true,
                "data" => [
                    "title" => "New news title",
                    "content" => "New news content"
                ]
            ]);
    }

    /**
     * Testing news update method
     * @return void
     */
    public function test_news_update()
    {
        // Given data

        $row = News::factory()->create([
            "title" => "New news title",
            "content" => "New news content"
        ]);
        $updateData = [
            'title' => 'New Title Updated',
            'content' => 'Updated content'
        ];
        // acting 
        $this->json('PATCH', 'api/news/'. $row->id, $updateData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                "success",
                "message"
            ])
            ->assertJson([
                "success" => true,
                "message" => 'News record successfully updated!'
            ]);
    }

    /**
     * Testing news delete method
     * @return void
     */
    public function test_news_delete()
    {
        // Given data

        $row = News::factory()->create([
            "title" => "New news title",
            "content" => "New news content"
        ]);

        // acting 
        $this->json('DELETE', 'api/news/'. $row->id, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                "success",
                "message"
            ])
            ->assertJson([
                "success" => true,
                "message" => 'News record successfully deleted!'
            ]);
    }
}
