<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends User
{
    protected $table = 'users';

    public function tasks()
    {
        return $this->hasMany(Task::class, 'assigned_by_id');
    }
}

