<?php

namespace Database\Factories;

use App\Models\Petani;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PetaniFactory extends Factory
{
    protected $model = Petani::class;

    public function definition()
    {
        return [
			'nama' => $this->faker->name,
			'nik' => $this->faker->name,
			'alamat' => $this->faker->name,
			'no_hp' => $this->faker->name,
			'luas_lahan' => $this->faker->name,
			'status' => $this->faker->name,
        ];
    }
}
