<?php

use App\Models\BlogPost;
use Database\Seeders\CategorySeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Carbon;

uses(RefreshDatabase::class);
uses(WithoutMiddleware::class);

beforeEach(function () {
    $this->seed(CategorySeeder::class);
});

it('can create a blog post', function () {
    // Arrange: Prepare the data for creating a blog post
    $blogPostData = [
        'title' => 'Sample Blog Post',
        'excerpt' => 'This is the excerpt of the blog post.',
        'image' => '3',
        'category_id' => 1,
        'published_at' => Carbon::now()->startOfDay(),
        'published' => true,
    ];

    // Act: Simulate a POST request to the postAdd endpoint
    $response = $this->postJson('blog-post/add', $blogPostData);

    // Assert: Verify the response and that the blog post was created
    $response->assertStatus(302);
    $this->assertDatabaseHas('blog_posts', [
        'title' => 'Sample Blog Post',
        'excerpt' => 'This is the excerpt of the blog post.',
        'image' => '3',
        'category_id' => 1,
        'published_at' => Carbon::now()->startOfDay()->format('Y-m-d'),
        'published' => 1,
    ]);
});

// Test case for editing a blog post
it('can edit a blog post', function () {
    $this->withoutExceptionHandling();
    // Arrange: Create a blog post to edit
    $blogPost = BlogPost::create([
        'title' => 'Old Blog Post',
        'excerpt' => 'This is the old excerpt of the blog post.',
        'image' => '1',
        'category_id' => 1,
        'published_at' => Carbon::now()->startOfDay(),
        'published' => true,
    ]);

    // New data for updating the blog post
    $updatedBlogPostData = [
        'title' => 'Updated Blog Post',
        'excerpt' => 'This is the updated excerpt of the blog post.',
        'image' => '2',
        'category_id' => 2,
        'published_at' => Carbon::now()->addDay()->startOfDay(),
        'published' => false,
    ];

    // Act: Simulate a POST request to the postEdit endpoint
    $response = $this->postJson("blog-post/edit/{$blogPost->getKey()}/edit", $updatedBlogPostData);

    // Assert: Verify the response and that the blog post was updated
    $response->assertStatus(302);
    $this->assertDatabaseHas('blog_posts', [
        'id' => $blogPost->getKey(),
        'title' => 'Updated Blog Post',
        'excerpt' => 'This is the updated excerpt of the blog post.',
        'image' => '2',
        'category_id' => 2,
        'published_at' => Carbon::now()->addDay()->startOfDay()->format('Y-m-d'),
        'published' => 0,
    ]);
});
