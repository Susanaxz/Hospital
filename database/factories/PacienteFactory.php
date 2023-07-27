<?php

namespace Database\Factories;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PacienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Paciente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nif' => $this->faker->unique()->regexify('[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]'),
            'nombre' => $this->faker->firstName,
            'apellidos' => $this->faker->lastName,
            'fechaingreso' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'fechaalta' => $this->faker->optional()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
