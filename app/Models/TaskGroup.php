<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskGroup extends Model
{
    use HasFactory;

    public function taskGroup(): BelongsTo
    {
        return $this->belongsTo(TaskGroup::class);
    }
}
