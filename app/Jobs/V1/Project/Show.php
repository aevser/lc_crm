<?php

namespace App\Jobs\V1\Project;

use Illuminate\Foundation\Bus\Dispatchable;

class Show
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
        $project = \App\Models\Project\Project::findOrFail($this->project_id);

        return $project;
    }
}
