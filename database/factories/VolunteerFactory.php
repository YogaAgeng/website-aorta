<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class VolunteerFactory extends Factory
{
    protected $model = \App\Models\Volunteer::class;

    public function definition(): array
    {
        $skills = [
            'Leadership', 'First Aid', 'Teaching', 'Cooking', 'Driving',
            'Carpentry', 'Gardening', 'IT Skills', 'Fundraising', 'Event Planning'
        ];
        
        $interests = [
            'Education', 'Environment', 'Health', 'Elderly Care', 'Children',
            'Animals', 'Disaster Relief', 'Community Development', 'Arts & Culture'
        ];
        
        return [
            'user_id' => User::factory(),
            'skills' => implode(', ', fake()->randomElements($skills, fake()->numberBetween(1, 4))),
            'interests' => implode(', ', fake()->randomElements($interests, fake()->numberBetween(1, 3))),
            'occupation' => fake()->jobTitle(),
            'experience' => fake()->paragraph(),
            'availability' => fake()->randomElement(['weekdays', 'weekends', 'both']),
            'has_vehicle' => fake()->boolean(30),
            'has_license' => fake()->boolean(70),
            'emergency_contact' => fake()->phoneNumber() . ' (' . fake()->name() . ' - ' . fake()->randomElement(['Spouse', 'Parent', 'Sibling', 'Friend']) . ')',
        ];
    }
}
