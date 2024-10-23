<?php

namespace App\Jobs\V1\Project;

use Illuminate\Foundation\Bus\Dispatchable;

class Create
{
    use Dispatchable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private int $user_id,
        private string $api_token,
        private ?string $timezone,
        private ?bool $enabled,
        private ?bool $detect_region,
        private ?bool $calltracking,
        private int $leads_today,
        private int $leads_total
    )

    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $project = \App\Models\Project\Project::create([
            'user_id' => $this->user_id,
            'api_token' => $this->api_token,
            'timezone' => $this->timezone,
            'enabled' => $this->enabled,
            'detect_region' => $this->detect_region,
            'calltracking' => $this->calltracking,
            'leads_today' => $this->leads_today,
            'leads_total' => $this->leads_total
        ]);

        return $project;
    }
}
