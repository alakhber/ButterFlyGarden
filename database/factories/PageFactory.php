<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'slug'=>_slug($this->faker->name()),
            'content'=>'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sint quam nulla non sed quos, iure similique dolorem quidem magni, sunt at cupiditate. Explicabo, illum similique? Officiis veritatis vel optio ipsam?
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestias reiciendis ipsum corporis nobis, ut dolores quas possimus quos vero earum odit mollitia minima, ex, omnis consectetur quis. Animi, aliquam quibusdam!'
        ];
    }
}
