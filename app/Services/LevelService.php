<?php

namespace App\Services;

use App\Level;
use App\User;

/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 10/17/2017
 * Time: 6:14 PM
 */
class LevelService
{

    public function __construct()
    {

    }

//    get all users
    public function list(User $user)
    {
        return Level::all();
    }

//    get user by id
    public function find(User $user, $id)
    {
        return Level::where('id',$id)->first();
    }

}