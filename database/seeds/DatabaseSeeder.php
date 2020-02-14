<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $this->call('UsersTableSeeder');
        // factory(App\Product::class, 10)->create();

        DB::table('distributions')->insert([
            'unit' => 'horas',
            'duration' => '60',
            'time_start' => '13:00:00',
            'time_finish' => '14:00:00',
            'block' => '60',
        ]);

        $this->insertProducts();

        // DB::table('products')->insert([
        //     'name' => 'prueba producto',
        //     'description' => 'pruebita del producto',
        //     'id_distribution' => '1',

        // ]);

        try {

            $user = new User;
            $user->name = 'admin';
            $user->email = 'admin@admin.com';
            $user->password = app('hash')->make('admin');
            $user->role = 'ADMIN';

            $user->save();

            //return successful response
            return response()->json(['user' => $user, 'message' => 'User created'], 201);

        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'User Registration Failed!'], 409);
        }

        
    }


    public function insertProducts()
    {
        DB::table('products')->insert([
            'name' => 'Visit Loro Parque',
            'description' => 'Find in Loro Parque an incredible place to spend an unforgettable day. Enjoy 4 world-renowned animal shows and countless animal species that you can meet. Let yourself be surprised by the surprises and news that Loro Parque adds every year.',
            'img' => 'https://cdn.getyourguide.com/img/tour_img-1620348-146.jpg',
            'id_distribution' => '1',
        ]);

        DB::table('products')->insert([
            'name' => 'Discover Teror',
            'description' => 'Teror is a place of pilgrimage for all the residents of Gran Canaria, as the municipality holds in its Basilica the statue of the Virgen del Pino, Patron of the Diocese of the Canary Islands. Therefore, a visit to Teror means a visit to the Basilica. The Basilica is located in the town square Plaza del Pino, and construction began on the building in 1767, although it later had to be restored on several occasions, notably in 1968 and 1969. The current building, with a two-sided roof, has three naves with fourteen round arches held up by columns and pilasters. There are three entrances on the façade, and two entrances on the sides, with stained glass windows showing the Mysteries of the Rosary.',
            'img' => 'https://cdn.civitatis.com/espana/gran-canaria/galeria/teror.jpg',
            'id_distribution' => '1',
        ]);

        DB::table('products')->insert([
            'name' => 'Rent a bike',
            'description' => '',
            'img' => 'https://media-cdn.tripadvisor.com/media/photo-s/11/86/e8/e3/barrio-de-vegueta-las.jpg',
            'id_distribution' => '1',
        ]);

        DB::table('products')->insert([
            'name' => 'Tennis court',
            'description' => '',
            'img' => 'https://tennisgrancanaria.net/wp-content/uploads/2019/10/tennis_court_rental_gran_canaria.jpg',
            'id_distribution' => '1',
        ]);

    }
}
