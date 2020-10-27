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
        return isset($user);
    }
    public function store(User $user, Client $client)
    {
        return isset($user);
    }
    public function create(User $user, Client $client)
    {
        return isset($user);
    }
    public function delete(User $user, Client $client)
    {
        return $user->profile == 'admin';
    }
}
