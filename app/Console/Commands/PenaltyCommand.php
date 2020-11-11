<?php

namespace App\Console\Commands;

use App\Jobs\PenaltyJob;
use Illuminate\Console\Command;

class PenaltyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'penalize:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command issue penalties to users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        PenaltyJob::dispatch();
        
    }
}
