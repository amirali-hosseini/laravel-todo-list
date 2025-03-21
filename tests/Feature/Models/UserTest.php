<?php

namespace Tests\Feature\Models;

use App\Models\User;
use Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Traits\InsertDataTrait;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase, InsertDataTrait;

    public function additionalParams(): array
    {
        return ['password' => Hash::make('password')];
    }

    public function model(): Model
    {
        return new User();
    }
}
