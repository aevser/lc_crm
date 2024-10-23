<?php

namespace App\Models\Project;

use App\Models\Host;
use App\Models\Project\Lead\Lead;
use App\Models\Project\Lead\LeadClasses;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'api_token',
        'timezone',
        'enabled',
        'detect_region',
        'calltracking',
        'leads_today',
        'leads_total'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function leads(): HasMany
    {
        return $this->hasMany(Lead::class);
    }

    public function hosts(): HasMany
    {
        return $this->hasMany(Host::class);
    }

    public function leadClasses(): HasMany
    {
        return $this->hasMany(LeadClasses::class);
    }
}
