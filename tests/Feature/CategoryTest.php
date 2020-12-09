<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Thread;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    const CATEGORIES = 'categories';

    function test_it_can_be_created()
    {
        $data = [
            'name' => 'test category',
        ];
        $this->assertDatabaseMissing(self::CATEGORIES, $data);
        $route = route('categories.store');

        $response = $this->post($route, $data);

        $response->assertSuccessful();
        $this->assertDatabaseHas(self::CATEGORIES, $data);
    }

    function test_it_can_be_updated()
    {
        $data = [
            'name' => 'test category',
        ];
        $updateData = [
            'name' => 'updated category',
        ];
        $category = Category::create($data);
        $this->assertDatabaseMissing(self::CATEGORIES, $updateData);
        $route = route('categories.update', $category);

        $response = $this->putJson($route, $updateData);

        $response->assertSuccessful();
        $this->assertDatabaseMissing(self::CATEGORIES, $data);
        $this->assertDatabaseHas(self::CATEGORIES, $updateData);
    }

    function test_it_can_show_index()
    {
        Category::factory(30)->create();
        $route = route('categories.index');

        $response = $this->getJson($route);

        $response
            ->assertSuccessful()
            ->assertJsonCount(15, 'data')
            ->assertJsonStructure(['data' => ['*' => ['id', 'name']]])
        ;
    }

    // function test_it_can_be_shown()

    function test_it_can_be_deleted()
    {
        $data = ['name' => 'test category'];
        $category = Category::create($data);
        $this->assertDatabaseHas(self::CATEGORIES, $data);
        $route = route('categories.destroy', $category);

        $response = $this->deleteJson($route);

        $response->assertSuccessful();
        $this->assertDatabaseMissing(self::CATEGORIES, $data);
    }
}
