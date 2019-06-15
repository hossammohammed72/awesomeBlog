<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class PostTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCreatePostWithMiddleware()
    {
        $this->withoutExceptionHandling();
        $this->expectException(\Illuminate\Auth\AuthenticationException::class);

        Storage::fake('public');

        $data = $this->getPostRequestData();
        $response = $this->json('POST',route('admins.posts.store'),$data);
        $response->assertStatus(401);
        $response->assertJson(['message' => "Unauthenticated."]);
    }

    public function testCreatePost()
    {
        $this->withoutExceptionHandling();
            $data = $this->getPostRequestData();
            $user = factory(\App\User::class)->create();
            $response = $this->actingAs($user, 'web')->json('POST', route('admins.posts.store'),$data);
            $response->assertStatus(200);
            $response->assertJson(['success' => true]);
      }
      private function getPostRequestData(){
          for($i=0;$i<3;$i++)
          $categories[]=factory(\App\User::class)->create()->id;
        $data = [
            'title' => "New Product",
            'content' => "This is a product",
            'categories' => [1000,10000,25000],
            'image' => UploadedFile::fake()->image('random.jpg')
                   ];
                   return $data;
      }
 

}
