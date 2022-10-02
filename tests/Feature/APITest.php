<?php

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Faker\Factory;
use function Tests\actingAs;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

// it('has post page', function () {
//     $user = factory(User::class)->create();

//     $response = $this->actingAs($user)
//         ->withSession
// });

it('Can_Create_Post_Test', function (){
    $user = User::factory()->create();
    $category = Category::factory()->create();

    $post = new stdClass();
    $post->title = "Create Test Title One";
    $post->content = "This is content of test post one";

    $this->actingAs($user, 'api')
        -> post(route('posts.store'), [
            'title' => $post->title,
            'content' => $post->content,
            'user_id' => $user->id,
            'category_id' => $category->id
        ])->assertSuccessful();

    $this->assertDatabaseHas('posts',[
        'title' => $post->title,
        'content' => $post->content,
        'user_id' => $user->id,
        'category_id' => $category->id
    ]);
});


it('Can_Update_Post_Test', function(){
    $user = User::factory()->create();
    $category = Category::factory()->create();

    $post = Post::factory()->make();
    $post->user_id = $user->id;
    $post->category_id = $category->id;

    $user->posts()->save($post);

    $updatePost = [
        'title' => 'Update Title test',
        'content' => 'Update Content test',
        'user_id' => $user->id,
        'category_id' => $category->id
    ];

    $this->actingAs($user, 'api')
        ->put(route('posts.update', $post->id), $updatePost)
        ->assertSuccessful();
    
    $this->assertDatabaseHas('posts', $updatePost);    
});


it('Can_Show_Test', function(){
    $user = User::factory()->create();
    $category = Category::factory()->create();

    $this->actingAs($user, 'api');
    $post = Post::factory()->make();
    $post->user_id = $user->id;
    $post->category_id = $category->id;
    $user->posts()->save($post);

    $this->get(route('posts.show', $post->id))->assertStatus(200);
});

it('Can_Delete_Test', function(){
    $user = User::factory()->create();
    $category = Category::factory()->create();

    $this->actingAs($user, 'api');
    $post = Post::factory()->make();
    $post->user_id = $user->id;
    $post->category_id = $category->id;
    $user->posts()->save($post);

    $this->delete(route('posts.destroy', $post->id))->assertStatus(200);
});

it('Can_List_Test', function () {
    $user = User::factory()->create();
    $category = Category::factory()->create();

    $this->actingAs($user, 'api');

    $post = Post::factory(3)->make();

    $user->posts()->saveMany($post);
    $category->posts()->saveMany($post);

    $this->get(route('posts.index'))->assertStatus(200);
});