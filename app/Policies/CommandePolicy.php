<?php

namespace App\Policies;

use App\User;
use App\Commande;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommandePolicy
{
    use HandlesAuthorization;

    public function before($user, $ability){

        if($user->is_admin == 1){
            return true;
        }
    }
    /**
     * Determine whether the user can view the commande.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function view(User $user)
    {
        $test = DB::table('permissions')->get()->first();
        if ($test->show_commande and $test->id_user == $user->id){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can create commandes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        $test = DB::table('permissions')->get()->first();
        if ($test->create_commande and $test->id_user == $user->id){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can update the commande.
     *
     * @param  \App\User  $user
     * @param  \App\Commande  $commande
     * @return mixed
     */
    public function update(User $user, Commande $commande)
    {
        $test = DB::table('permissions')->get()->first();
        if ($test->update_commande and $test->id_user == $user->id){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can delete the commande.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function delete(User $user)
    {
        $test = DB::table('permissions')->get()->first();
        if ($test->delete_commande and $test->id_user == $user->id){
            return true;
        }else{
            return false;
        }
    }
}
