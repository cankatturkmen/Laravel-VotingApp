<?php

namespace Tests\Feature;
use App\Models\Idea;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowIdeasTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use  RefreshDatabase;
    /** @test */
    public function list_of_ideas_shows_on_main_page(){

        $ideaOne = Idea::factory()->create([
            'title'=> 'My title',
            'description'=> 'my desciption'
        ]);

        $ideaTwo = Idea::factory()->create([
            'title'=> 'My 2 title',
            'description'=> 'my  2 desciption'
        ]);

        $response = $this-> get(route('idea.index'));

        $response-> assertSuccessful();
        $response->assertSee($ideaOne->title);
        $response->assertSee($ideaOne->description);
        $response->assertSee($ideaTwo->title);
        $response->assertSee($ideaTwo->description);
    }
    /** @test */
    public function single_idea_shows_correctly_on_the_show_page(){

        $idea = Idea::factory()->create([
            'title'=> 'My title',
            'description'=> 'my desciption'
        ]);



        $response = $this-> get(route('idea.show',$idea));

        $response-> assertSuccessful();
        $response->assertSee($idea->title);
        $response->assertSee($idea->description);

    }

}
