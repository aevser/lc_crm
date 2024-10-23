<?php

namespace App\Jobs\V1\Lead;

use Illuminate\Foundation\Bus\Dispatchable;

class Delete
{
    use Dispatchable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private int $lead_id
    )

    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        return \App\Models\Project\Lead\Lead::destroy($this->lead_id);
    }
}
