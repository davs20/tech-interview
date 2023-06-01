<?php

namespace App\Models;

use App\Models\Scopes\ProjectsUser;
use App\Models\Scopes\TaskAssignedToUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;


    protected static function booted(): void
    {
        static::addGlobalScope(new TaskAssignedToUser);
    }



    public function owner()
    {
        # code...
    }

    public function assignTo()
    {
        # code...
    }
}
