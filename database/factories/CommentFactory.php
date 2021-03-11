<?php
namespace Database\Factories;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'text' => $this->faker->realText(rand(10, 300)),
            'email' => $this->faker->unique()->safeEmail,
            'user_id' => function () {
                return User::inRandomOrder()->first()->id;
            },
        ];
    }
}
