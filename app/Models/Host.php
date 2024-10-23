<?php

namespace App\Models;

use App\Models\Project\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Host extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'url'
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
