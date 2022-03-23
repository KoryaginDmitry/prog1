<?php

namespace App\Policies;

use App\Models\MainModel;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class MainPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function insert($user){
        if($user && $user->type == 'waiter'){
            Response::allow('sad');
        }
    }

    public function update(){

    }

    public function delete(){

    }

    public function getInfo($user){
        if($user && $user->type == 'waiter'){
            Response::allow('У вас есть права для доступа к странице');
        }
        else{
            Response::deny('Вам необходимо <a href="/login">авторизоваться</a>');
        }
    } 
}
