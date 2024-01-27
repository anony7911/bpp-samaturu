<?php

namespace Database\Factories;

use App\Models\Kriteria;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class KriteriaFactory extends Factory
{
    protected $model = Kriteria::class;

    public function definition()
    {
        return [
			'nama' => $this->faker->name,
			'bobot' => $this->faker->name,
			'tipe' => $this->faker->name,
        ];
    }
}
