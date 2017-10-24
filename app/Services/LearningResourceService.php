<?php

namespace App\Services;

use App\User;
use App\LearningResource;

/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 10/17/2017
 * Time: 6:14 PM
 */
class LearningResourceService
{

    public function __construct()
    {

    }

//    get all users
    public function list(User $user)
    {
        return LearningResource::all();
    }

//    get user by id
    public function find(User $user, $id)
    {
        return LearningResource::where('id',$id)->first();
    }

}