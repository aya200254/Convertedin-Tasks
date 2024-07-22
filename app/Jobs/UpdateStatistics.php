<?php

namespace App\Jobs;
use App\Models\User;
use App\Models\Statistic;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateStatistics implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $users = User::withCount('tasks')->get();
        foreach ($users as $user) {
            Statistic::updateOrCreate(
                ['user_id' => $user->id],
                ['task_count' => $user->tasks_count]
            );
        }
    }
}
