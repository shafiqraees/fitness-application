<?php

namespace App\Repositories\Contracts;

interface StepRepositoryContract
{
    /**
     * @return mixed
     */
    public function dailyStepData();

    /**
     * @return mixed
     */
    public function leaderBoardData();
}
