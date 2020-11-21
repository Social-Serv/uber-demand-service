<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class MakeDriverSearchRequest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    // todo set the API endpoint
    protected $proxyApiMakeDriverRequest = 'https://ptsv2.com/t/fppmp-1605965272/post';
    protected $requestData;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($requestData)
    {
        $this->requestData = $requestData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // todo mapping object logic
        $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post($this->proxyApiMakeDriverRequest, $this->requestData);
    }
}
