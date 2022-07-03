<?php

namespace App\Repositories;


use App\Models\Step;
use App\Repositories\Contracts\StepRepositoryContract;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class StepRepository implements StepRepositoryContract
{
    /**
     * @return mixed
     * @throws \Exception
     */
    public function dailyStepData() {
        try {
            return Cache::remember("steps-".auth()->user()->id,config('app.cache_days'), function() {
                return Step::select('step_count','start_time','end_time')->whereUserId(auth()->user()->id)->get();
            });
        } catch (\Exception $exception) {
            report($exception);
            throw $exception;
        }
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function leaderBoardData(){
        try {
            return Cache::remember("leaderboard-".auth()->user()->id,config('app.cache_days'), function() {
                return Step::with('user:id,name,profile_image_path')->whereDate('start_time', Carbon::today())->get();
            });
        } catch (\Exception $exception) {
            report($exception);
            throw $exception;
        }
    }
}
