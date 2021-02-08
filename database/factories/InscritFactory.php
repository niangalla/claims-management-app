<?php

namespace Database\Factories;

use App\Models\Inscrit;
use Illuminate\Database\Eloquent\Factories\Factory;

class InscritFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Inscrit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $sex = 'H';
        $pass = 'niania';
        return [
            'identifiant_student' => $this->faker->userName,
            'prenom' => $this->faker->firstName,
            'nom' => $this->faker->lastName,
            'password' => $pass,
            'mail' => $this->faker->email,
            'adresse' => $this->faker->address,
            'bio' => $this->faker->paragraph(1),
            'sex' => $sex,
            'cni' => $this->faker->numberBetween(1,12),
            'dateNaissance' => $this->faker->date('Y-m-d'),

        ];
    }
}
