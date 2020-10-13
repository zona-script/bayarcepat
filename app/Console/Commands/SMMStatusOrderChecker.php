<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SMMStatusOrderChecker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'smm:statusorderchecker';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'For checking all smm status order, if status not error, success or partial.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        echo "Start at: ".date("Y-m-d H:i:s")."\n";
        dispatch(new \App\Jobs\SMMStatusOrderChecker());
        echo "Finished at: ".date("Y-m-d H:i:s")."\n";
    }
}
