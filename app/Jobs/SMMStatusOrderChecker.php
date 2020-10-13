<?php

namespace App\Jobs;

use App\Enums\TransactionPanelEnum;
use App\Models\TransactionPanel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SMMStatusOrderChecker implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $transactionPanels = TransactionPanel::where('status', TransactionPanelEnum::PROCESSING)
            ->get();

        echo "running";

        // TODO: buat looping untuk cek status order
    }
}
