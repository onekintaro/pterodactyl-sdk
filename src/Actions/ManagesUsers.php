<?php

namespace HCGCloud\Pterodactyl\Actions;

use HCGCloud\Pterodactyl\Resources\User;

trait ManagesUsers
{

    /**
     * Get the collection of users.
     *
     * @return User[]
     */
    public function users()
    {
        return $this->transformCollection(
            $this->get('api/application/users')['data'],
            User::class
        );
    }

    /**
     * Get a user instance.
     *
     * @param  integer $userId
     * @return User
     */
    public function user($userId)
    {
        return new User($this->get("api/application/users/$userId"), $this);
    }
	
    /**
     * Get a user instance by external id.
     *
     * @param  integer $userExternalId
     * @return User
     */
    public function userEx($userExternalId)
    {
        return new User($this->get("api/application/users/external/$userExternalId"), $this);
    }
    /**
     * Create a new user.
     *
     * @param  array $data
     * @return User
     */
    public function createUser(array $data)
    {
        return new User($this->post('api/application/users', $data), $this);
    }

    /**
     * Update a specified user.
     *
     * @param  integer $userId
     * @param  array $data
     * @return User
     */
    public function updateUser($userId, array $data)
    {
        return new User($this->patch("api/application/users/$userId", $data), $this);
    }
	
    /**
     * Delete the given user.
     *
     * @param  integer $userId
     * @return void
     */
    public function deleteUser($userId)
    {
        return $this->delete("api/application/users/$userId");
    }
}
