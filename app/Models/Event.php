<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['task_id', 'title', 'description', 'start_date', 'final_date'];

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }


}
