<?php

namespace App\Listeners;

use App\Events\LeadAdded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class CountLeadListeners
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(LeadAdded $event)
    {
        $lead = $event->lead;
        $project = \App\Models\Project\Project::find($lead->project_id);

        $leads_today = $project->leads()
            ->whereDate('created_at', today())
            ->count();

        $leads_total = $project->leads()->count();
        $project->update([
            'leads_today' => $leads_today,
            'leads_total' => $leads_total
        ]);
    }
}
