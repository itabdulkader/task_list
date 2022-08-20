<?php

namespace Tests\Feature;

use App\Models\task;
use App\Models\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class taskTest extends TestCase
{
    use WithFaker;

    public function testShouldCreateTask()
    {
        $title = $this->faker->name;
        $description = $this->faker->name;
        $data = ['title' => $title, 'description' => $description, 'assigned_by_id' => 1,"assigned_to_id"=>2];

        $this->json('post', route('tasks.store'), $data);
        $this->assertDatabaseHas('tasks', $data);
    }

    public function testShouldDestroyTask()
    {
        // seeding a new object
        $task = task::factory()->create();

        $this->json('post', route('tasks.destroy', $task), ['_method' => 'delete']);
        $this->assertSoftDeleted('tasks', ['id' => $task->id]);
    }

    public function testShouldGetAllTasks()
    {
        $tasks = task::with("user:id,name")->with("admin:id,name")->latest()->first();

        $this->assertArrayHasKey('idw', $tasks);
        $this->assertArrayHasKey('title', $tasks);
        $this->assertArrayHasKey('description', $tasks);
        $this->assertArrayHasKey('assigned_by_id', $tasks);
        $this->assertArrayHasKey('assigned_to_id', $tasks);
    }

}
