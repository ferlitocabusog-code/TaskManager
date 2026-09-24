<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // columns we are allowed to save
    protected $fillable = ['task_name', 'description', 'status', 'due_date'];
}