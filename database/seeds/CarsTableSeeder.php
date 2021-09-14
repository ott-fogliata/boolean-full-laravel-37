<?php

use App\Car;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CarsTableSeeder extends Seeder
{


    protected function getRedirectFinalUrl($url)
    {  //curl
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_NOBODY, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // follow redirects
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1); // set referer on redirect
        curl_exec($ch);
        $target = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
        curl_close($ch);

        if ($target)
            return $target;

        return false;
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $carBrands = [
            'alfa romeo', 
            'ferrari', 
            'smart', 
            'bmw', 
            'mercedes', 
            'tesla', 
            'fiat', 
            'ford'
        ];



        for ($i = 0; $i < 50; $i++){
            
            $randBrandKey = array_rand($carBrands, 1);    

            $car = new Car();
            $car->brand = $carBrands[$randBrandKey]; // random brand
            $car->model_name = $faker->words(1, true);

            $engineString = $faker->words(1, true);
            $car->engine = "{$engineString} engine";

            $car->hp = $faker->numberBetween(50, 2000);

            $car->vin = $faker->bothify('?#?#?#?#?#?#?#?##');

            $car->color = $faker->colorName();

            $finalUrl = $this->getRedirectFinalUrl('https://loremflickr.com/320/240/cars');

            echo $finalUrl . "\n";

            $car->picture = $finalUrl;

            $car->brand_new = $faker->boolean();

            $car->price = $faker->randomFloat(2, 1000, 1000000);

            $car->save();
        
        }

    }
}
