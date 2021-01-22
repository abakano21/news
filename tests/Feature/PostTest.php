<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_have_posts()
    {

        $this->signIn();

        $post = Post::factory()->create([
            'title' => 'test title',
            'short_description' => 'Short description test',
            'full_description' => 'Full description test',
            'user_id' => auth()->id()
        ]);

        $this->assertEquals(auth()->id(), $post->user_id);

        $this->get($post->path())->assertSee('test title');
    }

    /** @test */
    public function a_post_requires_a_title()
    {
        $this->signIn();

        $attributes = Post::factory()->raw(['title' => '']);

        $this->post('/posts', $attributes)->assertSessionHasErrors('title');
    }

    /** @test */
    public function auth_user_cannot_update_other_post()
    {
        $otherUser = User::factory()->create();

        $this->signIn();

        $post = Post::factory()->create(['user_id' => $otherUser->id]);

        $this->get(route('posts.edit', $post))->assertStatus(403);
    }
}
