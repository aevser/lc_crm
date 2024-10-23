<?php

namespace App\Models\Project\Lead;

use App\Models\Project\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LeadClasses extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'lead_id',
        'name',
        'type',
        'color'
    ];

    public function lead(): BelongsTo
    {
        return $this->belongsTo(Lead::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
