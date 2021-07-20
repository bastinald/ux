<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        if (method_exists($this->model, 'definition')) {
            return app($this->model)->definition($this->faker);
        }

        return [];
    }
}
