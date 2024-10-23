<?php

namespace App\Models\Project\Lead;

use App\Models\Project\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'owner',
        'company',
        'status',
        'name',
        'surname',
        'patronymic',
        'full_name',
        'phone',
        'entries',
        'email',
        'cost',
        'comment',
        'city',
        'region',
        'manual_region',
        'manual_city',
        'host',
        'ip',
        'source',
        'url_query_string',
        'utm',
        'utm_medium',
        'utm_source',
        'utm_campaign',
        'utm_content',
        'utm_term',
        'nextcall_date',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function leadClasses(): HasMany
    {
        return $this->hasMany(LeadClasses::class);
    }
}
