<?php

namespace Database\Factories;

use App\Models\Alternatif;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AlternatifFactory extends Factory
{
    protected $model = Alternatif::class;

    public function definition()
    {
        return [
			'nama_alternatif' => $this->faker->name,
			'harga_id' => $this->faker->name,
			'bahanaktif_id' => $this->faker->name,
			'dayatahan_id' => $this->faker->name,
			'hamadibasmi_id' => $this->faker->name,
        ];
    }
}
