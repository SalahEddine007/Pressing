<?php

namespace App\Policies;

use App\Permission;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Client;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability){

        if($user->is_admin == 1){
            return true;
        }
    }
    /**
     * Determine whether the user can view the client.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function view(User $user)
    {
        $test = DB::table('permissions')->get()->first();
        if ($test->show_client and $test->id_user == $user->id){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can create clients.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        $test = DB::table('permissions')->get()->first();
        if ($test->create_client and $test->id_user == $user->id){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can update the client.
     *
     * @param  \App\User  $user
     * @param  \App\Client  $client
     * @return mixed
     */
    public function update(User $user, Client $client)
    {
        $test = DB::table('permissions')->get()->first();
        if ($test->update_client and $test->id_user == $user->id){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can delete the client.
     *
     * @param  \App\User  $user
     * @param  \App\Client  $client
     * @return mixed
     */
    public function delete(User $user, Client $client)
    {
        $test = DB::table('permissions')->get()->first();
        if ($test->delete_client and $test->id_user == $user->id){
            return true;
        }else{
            return false;
        }

    }
}
