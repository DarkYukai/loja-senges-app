<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nome = $this->faker->unique()->sentence();
        return [
            //
            'nome' => $nome,
            'descricao' => $this->faker->paragraph(),
            'slug' => Str::slug($nome),
            'image' => $this->faker->imageUrl(400, 400),
            'id_user' => User::pluck('id')->random(),
            'id_category' => Category::pluck('id')->random()
        ];
    }
}
