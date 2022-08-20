<?php

namespace App\Jobs;

use App\Models\Statistics;
use App\Models\task;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class statisticsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    Private Task $task;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(task $task)
    {
        $this->task = $task;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Statistics::updateOrCreate(["user_id"=>$this->task->assigned_to_id],["user_name"=>User::find($this->task->assigned_to_id)->name??"","tasks_count"=> \DB::raw('tasks_count + 1')]);

    }
}
