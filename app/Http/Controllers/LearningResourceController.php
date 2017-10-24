<?php

namespace App\Http\Controllers;

use App\Services\LearningResourceService;
use App\Services\UserService;
use Illuminate\Http\Request;

class LearningResourceController extends Controller
{

    /** @var LearningResourceService */
    private $learningResourceService;


    /**
     * UserController constructor.
     *
     * @param LearningResourceService $learningResourceService
     */
    public function __construct(
        LearningResourceService $learningResourceService
    )
    {
        $this->learningResourceService = $learningResourceService;
    }

    /**
     * Get all users based on role
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function list(Request $request)
    {
        $user = $request->user();

        $list = $this->learningResourceService->list($user);

        return response()->json([
            'errors' => false,
            'data' => $list,
        ]);
    }

    /**
     * Get specific user
     *
     * @param Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function find(Request $request, $id)
    {
        $user = $request->user();

        $retrievedLearningResource = $this->learningResourceService->find($user, $id);

        return response()->json([
            'errors' => false,
            'data' => $retrievedLearningResource,
        ]);
    }
    /**
     * Get specific user
     *
     * @param Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function findUsers(Request $request, $id)
    {
        $user = $request->user();

        $retrievedLearningResource = $this->learningResourceService->find($user, $id);

        return response()->json([
            'errors' => false,
            'data' => $retrievedLearningResource->users,
        ]);
    }
}
