<?php

namespace DummyFactoryNamespace;

use DummyModelNamespace\DummyModelClass;
use Illuminate\Database\Eloquent\Factories\Factory;

class DummyFactoryClass extends Factory
{
    protected $model = DummyModelClass::class;

    public function definition()
    {
        if (method_exists($this->model, 'definition')) {
            return app($this->model)->definition($this->faker);
        }

        return [];
    }
}
