<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Scopes\TaskAssignedToUser;

class Task extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tasks';
    protected $fillable = ['title', 'description', 'assign_date', 'deadline', 'priority', 'project_id', 'assign_to', 'column_task_id'];
    protected $casts = [
        'deadline' => 'date:d/m/Y',
    ];
    protected static function booted(): void
    {
       static::addGlobalScope(new TaskAssignedToUser);
    }



    public function owner()
    {
        return $this->belongsTo(User::class ,'created_by');
    }

    public function assignTo()
    {
        return $this->belongsTo(User::class ,'assign_to');
    }

    public function column()
    {
        return $this->belongsTo(ColumnTask::class, 'column_task_id');
    }
}
