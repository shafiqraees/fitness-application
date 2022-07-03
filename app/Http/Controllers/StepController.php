<?php

namespace App\Http\Controllers;

use App\Http\Resources\StepResource;
use App\Repositories\Contracts\StepRepositoryContract;
use Illuminate\Http\JsonResponse;

class StepController extends Controller
{
    /**
     * @var StepRepositoryContract
     */
    private StepRepositoryContract $stepRepo;

    /**
     * @param StepRepositoryContract $stepRepo
     */
    function __construct(StepRepositoryContract $stepRepo){
        $this->stepRepo = $stepRepo;
    }

    /**
     * @return JsonResponse|\Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function dailySteps() {
        try {
            $data = $this->stepRepo->dailyStepData();
            return StepResource::collection($data);
        } catch(\Exception $exception){
            report($exception);
            return response()->json(['error' => 'Oops! something went wrong please try again later'], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @return JsonResponse|\Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function leaderBoard() {
        try {
            $data = $this->stepRepo->leaderBoardData();
            return StepResource::collection($data);
        } catch(\Exception $exception){
            report($exception);
            return response()->json(['error' => 'Oops! something went wrong please try again later'], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
