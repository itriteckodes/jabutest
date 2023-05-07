<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'due_date',
        'frequency',
        'iteration_start_date',
        'iteration_end_date',
        'iteration_count',
        'completed',
        'task_group_id'
    ];

    public function tasks(): HasMany
    {

        return $this->hasMany(Task::class);
    }
}