<?php

namespace Database\Factories;

use App\Models\File;
use App\Services\FilesService;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = File::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $fileService = new FilesService;

        $hash = Str::random(40);
        $name = str_replace(' ', '_', $this->faker->sentence(2));
        $extension = $this->faker->randomElement($fileService->getAllowedExtensions());

        return [
            'path' => $fileService->getTabsPath() . '/' . $hash[0] . '/' . $hash . '.bin',
            'name' => $name . $extension,
            'extension' => $extension,
            'size' => $this->faker->numberBetween(1, 99999),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
