<?php

namespace App\Jobs\V1\Host;

use Illuminate\Foundation\Bus\Dispatchable;

class Create
{
    use Dispatchable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private int $project_id,
        private string $url,
    )

    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $host = \App\Models\Host::create([
            'project_id' => $this->project_id,
            'url' => $this->url
        ]);

        return $host;
    }
}
