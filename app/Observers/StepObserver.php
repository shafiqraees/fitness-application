<?php

namespace App\Observers;

use App\Models\Step;
use Illuminate\Support\Facades\Cache;

class StepObserver
{
    /**
     * Handle the Step "created" event.
     *
     * @param  \App\Models\Step  $step
     * @return void
     */
    public function created(Step $step)
    {
        Cache::forget("steps-".auth()->user()->id);
        Cache::forget("leaderboard-".auth()->user()->id);
    }

    /**
     * Handle the Step "updated" event.
     *
     * @param  \App\Models\Step  $step
     * @return void
     */
    public function updated(Step $step)
    {
        Cache::forget("steps-".auth()->user()->id);
        Cache::forget("leaderboard-".auth()->user()->id);
    }

    /**
     * Handle the Step "deleted" event.
     *
     * @param  \App\Models\Step  $step
     * @return void
     */
    public function deleted(Step $step)
    {
        Cache::forget("steps-".auth()->user()->id);
        Cache::forget("leaderboard-".auth()->user()->id);
    }

    /**
     * Handle the Step "restored" event.
     *
     * @param  \App\Models\Step  $step
     * @return void
     */
    public function restored(Step $step)
    {
        Cache::forget("steps-".auth()->user()->id);
        Cache::forget("leaderboard-".auth()->user()->id);
    }

    /**
     * Handle the Step "force deleted" event.
     *
     * @param  \App\Models\Step  $step
     * @return void
     */
    public function forceDeleted(Step $step)
    {
        //
    }
}
