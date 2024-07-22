<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Task;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the create task page.
     *
     * @return void
     */
    public function testCreateTaskPage()
    {
      
        User::factory()->create(['role' => 'admin']);
        User::factory()->create(['role' => 'user']);

        
        $response = $this->get('/task/create');

     
        $response->assertStatus(200);

        
        $response->assertViewHas('admins');
        $response->assertViewHas('users');
    }

    /**
     * Test storing a task.
     *
     * @return void
     */
    public function testStoreTask()
    {
        
        $assignedBy = User::factory()->create();
        $assignedTo = User::factory()->create();

     
        $response = $this->post('/task/store', [
            'assigned_by_id' => $assignedBy->id,
            'title' => 'Test Task',
            'description' => 'This is a test task description.',
            'assigned_to_id' => $assignedTo->id,
        ]);

        
        $this->assertDatabaseHas('tasks', [
            'title' => 'Test Task',
            'description' => 'This is a test task description.',
            'assigned_by_id' => $assignedBy->id,
            'assigned_to_id' => $assignedTo->id,
        ]);

      
        $response->assertRedirect(route('tasks.index'));
        $response->assertSessionHas('success', 'Task created successfully!');
    }

    /**
     * Test the tasks index page.
     *
     * @return void
     */
    public function testTasksIndex()
    {
       
        Task::factory()->count(15)->create();

       
        $response = $this->get('/tasks');

        
        $response->assertStatus(200);

       
        $response->assertViewHas('tasks');
        $response->assertSee('pagination');
    }

    /**
     * Test the statistics page.
     *
     * @return void
     */
    public function testStatisticsPage()
    {
        
        $users = User::factory()->count(5)->create();
        foreach ($users as $user) {
            Task::factory()->count(3)->create(['assigned_to_id' => $user->id]);
        }

       
        $response = $this->get('/statistics');

        $response->assertStatus(200);

       
        $response->assertViewHas('topUsers');
    }
}


