<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
                'name' => $this->faker->sentence ,
                'slug' => _slug($this->faker->sentence),
                'avatar'=>$this->faker->image(public_path('storage/service'), 400, 400, 'animals', true, true, 'cats', true, 'jpg'),
                'shortcontent' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus, vitae consectetur neque quam voluptate fugit commodi similique magni quaerat soluta alias nihil repellendus? Ipsum quo distinctio, velit voluptas sapiente officiis.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum iste similique commodi eos, provident quam labore id incidunt distinctio, est quae? Possimus sint dolor animi quod nostrum soluta magni eligendi!
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore aspernatur aperiam corrupti officia illum a porro quidem praesentium! Veniam, consectetur perspiciatis. Iusto ducimus blanditiis rem. Deleniti ducimus aperiam recusandae in?',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus, vitae consectetur neque quam voluptate fugit commodi similique magni quaerat soluta alias nihil repellendus? Ipsum quo distinctio, velit voluptas sapiente officiis.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum iste similique commodi eos, provident quam labore id incidunt distinctio, est quae? Possimus sint dolor animi quod nostrum soluta magni eligendi!
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore aspernatur aperiam corrupti officia illum a porro quidem praesentium! Veniam, consectetur perspiciatis. Iusto ducimus blanditiis rem. Deleniti ducimus aperiam recusandae in?'
        ];
    }
}
