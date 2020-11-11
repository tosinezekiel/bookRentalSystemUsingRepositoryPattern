<?php

namespace App\Jobs;

use App\Repositories\Contracts\RentedBookRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PenaltyJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $rentedbooks;

    public function __construct(RentedBookRepository $rentedbooks)
    {
        $this->rentedbooks = $rentedbooks;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try{

            $this->rentedbooks->penalizeUsers();

        }catch(\Exception $e){

            \Log::info("Error: ".$e->getMessage());

        }catch(\Error $e){

            \Log::info("Error: ".$e->getMessage());
            
        }
        
    }
}
