<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class PoistionChangeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $user;
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $salary = $this->user->salary;
        switch($salary)
        {
            case  3000 : $this->setUserPosition('manager'); break;
            case ($salary >= 1500 && $salary <= 3000)  : $this->setUserPosition('admin'); break;
            default: $this->setUserPosition('logistic');
        }
    }


    /**
     * set The Position attribute of the user
     */
    public function setUserPosition($position)
    {
        $this->user->position = $position;
        $this->user->save();
    }
}

