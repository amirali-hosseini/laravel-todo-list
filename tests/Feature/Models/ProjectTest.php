<?php

namespace Tests\Feature\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Traits\InsertDataTrait;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase, InsertDataTrait;

    public function model(): Model
    {
        return new Project();
    }
}
