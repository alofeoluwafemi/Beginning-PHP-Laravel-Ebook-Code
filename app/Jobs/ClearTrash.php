<?php

namespace App\Jobs;

use App\Inventory;
use DateInterval;
use DateTime;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class ClearTrash implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Create a new job instance.
     *
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @param Inventory $inventory
     * @return void
     * @throws \Exception
     */
    public function handle(Inventory $inventory)
    {
        $now = new DateTime('now');
        $threeMinutesDiff = new DateInterval('PT03M');
        $threeMinutesAgo = $now->sub($threeMinutesDiff)->format('Y-m-d H:i:s');

        $inventories = $inventory->onlyTrashed()->where('deleted_at','<=',$threeMinutesAgo)->get();

        foreach($inventories as $inventory){
            $inventory->forceDelete();
        }

        if($inventories->count() > 0) Mail::to('oluwafemialofe@gmail.com')->send(new \App\Mail\TrashNotification());
    }
}
