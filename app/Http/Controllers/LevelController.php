<?php

namespace App\Http\Controllers;

use App\Services\LevelService;
use Illuminate\Http\Request;

class LevelController extends Controller
{

    /** @var LevelService */
    private $levelService;


    /**
     * UserController constructor.
     *
     * @param LevelService $levelService
     */
    public function __construct(
        LevelService $levelService
    )
    {
        $this->levelService = $levelService;
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

        $list = $this->levelService->list($user);

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

        $retrievedUser = $this->levelService->find($user, $id);

        return response()->json([
            'errors' => false,
            'data' => $retrievedUser,
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
    public function findLearningResources(Request $request, $id)
    {
        $user = $request->user();

        $retrievedLevel = $this->levelService->find($user, $id);

        return response()->json([
            'errors' => false,
            'data' => $retrievedLevel->learningResources,
        ]);
    }
}
