<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'title',
        'description',
        'deadline',
        'status',
    ];

    public function status(): string
    {
        return $this->status === 'done'
            ? 'انجام شده'
            : (
                $this->status === 'not_done'
                ? 'انجام نشده'
                : 'در حال انجام'
            );
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
