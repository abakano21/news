<?php

namespace Tests\Unit;

use App\Models\Post;
use App\Models\User;
use Tests\TestCase;

class PostTest extends TestCase
{

    /** @test */
    public function it_belongs_to_an_owner()
    {
        parent::setUp();

        $user = User::factory()->create();
        $post = Post::factory()->create(['title' => 'test title', 'short_description' => 'short test', 'full_description' => 'full desc', 'user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $post->user);
    }
}
