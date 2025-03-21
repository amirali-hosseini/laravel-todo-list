<?php

namespace Tests\Feature\Models;

use App\Models\Task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Traits\InsertDataTrait;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase, InsertDataTrait;

    public function model(): Model
    {
        return new Task();
    }
}
