<?php

namespace App\Services;

use App\User;

/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 10/17/2017
 * Time: 6:14 PM
 */
class UserService
{

    public function __construct()
    {

    }

//    get all users
    public function list(User $user)
    {
        return User::all();
    }

//    get user by id
    public function find(User $user, $id)
    {
        return User::findOrFail(1,$id);
    }

}