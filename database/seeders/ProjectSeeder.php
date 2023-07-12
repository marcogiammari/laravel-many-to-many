<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as faker;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $stacksData = config('store.stacks');


        for ($i = 0; $i < 10; $i++) {
            $newProject = new Project();
            $newProject->name = $faker->domainName();
            $newProject->description = $faker->paragraphs(5, true);
            $newProject->image = "https://picsum.photos//600/600?random=1" . rand(1, 100);
            $newProject->link = $faker->url();

            $stack = '';
            for ($j = 0; $j < 4; $j++) {
                $num = rand(0, count($stacksData) - 1);
                if (!str_contains($stack, $stacksData[$num])) {
                    $stack .= $stacksData[$num] . ' ';
                } else {
                    $j--;
                }
            }
            $newProject->stack = $stack;
            $newProject->save();
        }
    }
}
