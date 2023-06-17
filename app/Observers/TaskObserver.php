<?php

namespace App\Observers;

use App\Models\Task;
use Illuminate\Support\Facades\Date;

class TaskObserver
{


    public function creating(Task $task){
        $task->assign_date = date('Y-m-d');
    }


    /**
     * Handle the task "created" event.
     *
     * @param  \App\Models\task  $task
     * @return void
     */



    public function created(Task $task)
    {
        //
    }

    /**
     * Handle the task "updated" event.
     *
     * @param  \App\Models\task  $task
     * @return void
     */
    public function updated(Task $task)
    {
        //
    }

    /**
     * Handle the task "deleted" event.
     *
     * @param  \App\Models\task  $task
     * @return void
     */
    public function deleted(Task $task)
    {
        //
    }

    /**
     * Handle the task "restored" event.
     *
     * @param  \App\Models\task  $task
     * @return void
     */
    public function restored(Task $task)
    {
        //
    }

    /**
     * Handle the task "force deleted" event.
     *
     * @param  \App\Models\task  $task
     * @return void
     */
    public function forceDeleted(Task $task)
    {
        //
    }
}
