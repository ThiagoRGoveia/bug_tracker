<?php

namespace Tracker\Adapter\Module\User\Login;

use Illuminate\Support\Facades\Auth;
use Tracker\Domain\Module\User\Login\Port\AuthPort;
use Tracker\Domain\Module\User\Login\Port\UserPort;
use Tracker\Domain\Module\User\Login\Entity\AuthenicatedUser;
use Tracker\Domain\Module\User\Login\Entity\UnauthenticatedUser;

class AuthIlluminateAdapter implements AuthPort
{
    private $userPort;
    public function __construct(UserPort $userport)
    {
        $this->userport = $userport;
    }
    public function authenticate(string $email, string $password)
    {
        if (!Auth::attempt(['email' => $email, 'password' => $password])) {
            return new UnauthenticatedUser();
        }
        $user =  $this->userPort->findUserByEmail($email);
        Auth::login($user);
        return new AuthenicatedUser(
            $user->id,
            $user->createToken('Personal Access Token')
        );
    }
}
