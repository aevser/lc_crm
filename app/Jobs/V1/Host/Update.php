<?php

namespace App\Jobs\V1\Host;

use Illuminate\Foundation\Bus\Dispatchable;

class Update
{
    use Dispatchable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private int $host_id,
        private int $project_id,
        private string $url
    )

    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $host = \App\Models\Host::findOrFail($this->host_id);
        $host->update([
            'project_id' => $this->project_id,
            'host_id' => $this->host_id,
            'url' => $this->url
        ]);

        return $host;
    }
}
