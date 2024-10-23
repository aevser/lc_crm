<?php

namespace App\Jobs\V1\Project;

use Illuminate\Foundation\Bus\Dispatchable;

class Delete
{
    use Dispatchable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private int $project_id
    )

    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        return \App\Models\Project\Project::findOrFail($this->project_id);
    }
}
