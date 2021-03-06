<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /** @var UserService */
    private $userService;


    /**
     * UserController constructor.
     *
     * @param UserService $userService
     */
    public function __construct(
        UserService $userService
    )
    {
        $this->userService = $userService;
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

        $list = $this->userService->list($user);

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

        $retrievedUser = $this->userService->find($user, $id);

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

        $retrievedUser = $this->userService->find($user, $id);

        return response()->json([
            'errors' => false,
            'data' => $retrievedUser->learningResources,
        ]);
    }
}
