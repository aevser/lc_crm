<?php

namespace App\Jobs\V1\Host;

use Illuminate\Foundation\Bus\Dispatchable;

class Delete
{
    use Dispatchable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private int $host_id
    )

    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        return \App\Models\Host::destroy($this->host_id);
    }
}
