<?php

namespace Imanghafoori\AnyPass;

use Illuminate\Auth\DatabaseUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

class AnyPassDatabaseUserProvider extends DatabaseUserProvider
{
    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable $user
     * @param  array $credentials
     * @return bool
     */
    public function validateCredentials(UserContract $user, array $credentials)
    {
        if (env('APP_DEBUG') === true && env('APP_ENV') === 'local' && env('ANY_PASS', true))
        {
            return true;
        }
        return parent::validateCredentials($user, $credentials);
    }
}
