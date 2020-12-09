<?php

namespace Tests;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseTransactions;

    public function actingAs(UserContract $user, $driver = 'api')
    {
        return parent::actingAs($user, $driver);
    }

    public function signIn(User $user = null)
    {
        return $this->actingAs($user ?? User::first());
    }
}
