<?php

namespace App\Jobs\V1\Lead;

use Illuminate\Foundation\Bus\Dispatchable;

class Index
{
    use Dispatchable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        return \App\Models\Project\Lead\Lead::all();
    }
}
