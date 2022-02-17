<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->title(),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomFloat(2, 1, 100000),
            'count' => $this->faker->randomDigit(),
            'attributes' => $this->getAttributes(),
        ];
    }

    private function getRandomResolution(): string
    {
        $resolutions = ['1366 x 768', '1920 x 1024', '1920 x 1080', '3840 x 2160'];
        $keyRandom = array_rand($resolutions);
        return $resolutions[$keyRandom];
    }

    private function getAttributes()
    {
        $resolution = $this->getRandomResolution();

        return json_encode([
           'screen' => rand(20, 55),
           'resolution' => $resolution,
           'ports' => ['hdmi' => rand(1, 3), 'usb' => rand(2, 5), 'vga' => rand(0, 1)],
           'speakers' => ['power' => rand(3, 15) . 'watt']
        ]);
    }
}
