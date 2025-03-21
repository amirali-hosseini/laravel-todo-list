<?php

namespace Tests\Feature\Traits;

use Illuminate\Database\Eloquent\Model;

trait InsertDataTrait
{
    abstract public function model(): Model;

    // Override to provide additional parameters that will be merged with the factory data
    public function additionalParams(): array
    {
        return [];
    }

    /**
     * A basic test to insert data.
     */
    public function testInsertData()
    {
        $model = $this->model();

        $data = $model->factory()->create($this->additionalParams())->toArray();

        return $this->assertDatabaseHas($model->getTable(), $data);
    }
}