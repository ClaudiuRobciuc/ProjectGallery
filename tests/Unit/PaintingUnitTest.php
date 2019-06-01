<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\PaintingModel;
use Faker\Generator as Faker;

class PaintingUnitTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    use WithFaker;

    public function testUpdatePainting()
    {
        $painting = factory(PaintingModel::class)->create();
        
        $data = [
            'refference_id' => randomString(),
            'author' => $this->faker->name,
            'title' => $this->faker->word,
            'description' => $this->faker->text,
            'type' => 1,
            'image' => $this->faker->url,
            'price' => $this->faker->numberBetween(100,2000),
        ];
        
        $update = $painting->update($data);
        
        $this->assertTrue($update);
        $this->assertEquals($data['refference_id'], $painting->refference_id);
        $this->assertEquals($data['author'], $painting->author);
        $this->assertEquals($data['title'], $painting->title);
        $this->assertEquals($data['description'], $painting->description);
        $this->assertEquals($data['type'], $painting->type);
        $this->assertEquals($data['image'], $painting->image);
        $this->assertEquals($data['price'], $painting->price);
    }
    
    /** @test */
    public function testShowPainting()
    {
        $painting = factory(PaintingModel::class)->create();
        
        $found = PaintingModel::find($painting->id);
        
        $this->assertInstanceOf(PaintingModel::class, $found);
        $this->assertEquals($found->refference_id, $painting->refference_id);
        $this->assertEquals($found->author, $painting->author);
        $this->assertEquals($found->title, $painting->title);
        $this->assertEquals($found->description, $painting->description);
        $this->assertEquals($found->type, $painting->type);
        $this->assertEquals($found->image, $painting->image);
        $this->assertEquals($found->price, $painting->price);
    }

    /** @test */
    public function testCreatePainting()
    {
        
        $data = [
            'refference_id' => randomString(),
            'author' => $this->faker->name,
            'title' => $this->faker->word,
            'description' => $this->faker->text,
            'type' => 1,
            'image' => $this->faker->url,
            'price' => $this->faker->numberBetween(100,2000),
        ];
      
        $painting = new PaintingModel($data);
      
        $this->assertEquals($data['refference_id'], $painting->refference_id);
        $this->assertEquals($data['author'], $painting->author);
        $this->assertEquals($data['title'], $painting->title);
        $this->assertEquals($data['description'], $painting->description);
        $this->assertEquals($data['type'], $painting->type);
        $this->assertEquals($data['image'], $painting->image);
        $this->assertEquals($data['price'], $painting->price);
    }

}
