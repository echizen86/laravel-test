<?php

namespace App\Repositories;

use App\Models\User;

use Auth0\Login\Auth0User;
use Auth0\Login\Auth0JWTUser;
use Auth0\Login\Repository\Auth0UserRepository;

class CustomUserRepository extends Auth0UserRepository
{

    /**
     * Get an existing user or create a new one
     *
     * @param array $profile - Auth0 profile
     *
     * @return User
     */
    protected function upsertUser( $profile ) {

        $user = User::where( 'sub', $profile['sub'] )->first();

        if ( ! $user ) {

            $user = User::create([
                'email' => $profile['email'],
                'sub' => $profile['sub']
            ]);

        }
        return $user;
    }

    /**
     * Authenticate a user with a decoded ID Token
     *
     * @param object $jwt
     *
     * @return Auth0JWTUser
     */
    public function getUserByDecodedJWT( $jwt ) {
        $user = $this->upsertUser( (array) $jwt );
        return new Auth0JWTUser( (object) $user->getAttributes() );
    }

    /**
     * Get a User from the database using Auth0 profile information
     *
     * @param array $userinfo
     *
     * @return Auth0User
     */
    public function getUserByUserInfo( $userinfo ) {
        $user = $this->upsertUser( $userinfo['profile'] );
        return new Auth0User( $user->getAttributes(), $userinfo['accessToken'] );
    }
}