<?php

namespace App\Policies;

use App\User;
use App\Client;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientPolicy
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

    public function index(User $user, Client $client)
    {
        return false;
    }
    public function store()
    {
    }
    public function update(User $user, Client $client)
    {
        return false;
    }
    public function delete()
    {
    }
}
