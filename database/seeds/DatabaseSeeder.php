<?php

use Illuminate\Database\Seeder;
use App\Customer;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        
        // factory(App\Product::class, 10)->create();

        DB::table('distributions')->insert([
            'unit' => 'horas',
            'duration' => '60',
            'time_start' => '13:00:00',
            'time_finish' => '14:00:00',
            'block' => '60',
        ]);

        $this->insertProducts();
         $this->call('AvailabilitiesTableSeeder');

        try {

            $user = new Customer;
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
        $ruta = "http://192.168.103.210:8000";
        DB::table('products')->insert([
            'name' => 'Loro Parque',
            'description' => 'Find in Loro Parque an incredible place to spend an unforgettable day. Enjoy 4 world-renowned animal shows and countless animal species that you can meet. Let yourself be surprised by the surprises and news that Loro Parque adds every year.',
            'img' => $ruta .'/images/loro.jpg',
            'id_distribution' => '1',
        ]);

        DB::table('products')->insert([
            'name' => 'Maspalomas Dunes',
            'description' => 'The Maspalomas Dunes Special Natural Reserve is an immense expanse of sand which is continuously sculpted by the wind. The dunes are part of the San Bartolomé de Tirajana municipality in the south of the island of Gran Canaria and have had protected status since 1994.',
            'img' => $ruta .'/images/dunas.jpg',
            'id_distribution' => '1',
        ]);

        DB::table('products')->insert([
            'name' => 'Vegueta old town',
            'description' => 'Towards the south of Gran Canaria’s capital city, Vegueta was the original settlement that gave birth to Las Palmas at the end of the 15th Century. Its streets and squares contain historical buildings such as the Casa de Colon mansion, Santa Ana cathedral, the Museo Canario museum.',
            'img' => $ruta.'/images/vegueta.jpg',
            'id_distribution' => '1',
        ]);

        DB::table('products')->insert([
            'name' => 'Roque Nublo',
            'description' => 'This Natural Monument is one of the most representatives icons from the Canary Islands and, of course, from Gran Canaria. It is located in the municipality of Tejeda and it is the second highest place from the island with 1.813 meters high above sea level. Moreover, the Roque Nublo and its surroundings were declared Special Natural Area in 1987.',
            'img' => $ruta.'/images/roque.jpg',
            'id_distribution' => '1',
        ]);

        DB::table('products')->insert([
            'name' => 'Agaete',
            'description' => "The northern route finishes in the municipality of Agaete, an eminently coastal locality situated 30 kilometres from the capital. This marine municipality's town centre is found 43 metres above sea-level. The topography of Agaete is, in general, very abrupt. From this locality three main basins stand out: El Risco, Guayedra and Agaete. ",
            'img' => $ruta.'/images/agaete.jpg',
            'id_distribution' => '1',
        ]);

        DB::table('products')->insert([
            'name' => 'Scuba diving',
            'description' => "Gran Canaria Divers is the highly rated diving center next to Mogán beach (Playa de Mogán) and Mogán harbour (Puerto de Mogán), offering quality diving guidance and instruction both from shore and from boat. Our experienced multilingual team visits with you the most rewarding dive sites around Mogán and further along the Southwest Gran Canaria coast as well as selected sites in the East and North of the island.",
            'img' => $ruta.'/images/submarinismo.jpg',
            'id_distribution' => '1',
        ]);

        DB::table('products')->insert([
            'name' => 'Hair salon',
            'description' => "We offer the full range of hairdressing and cosmetic treatments: haircuts, coloring, hair repair treatments, hand and foot care, face and body treatments, including hardware cosmetology and various massages. Our high class staff performs many treatments that are unique. In our work we use products of the professional cosmetic and hairdressing brands, such as Macadamia (USA), Transvital (Switzerland), Vie collection (France). ",
            'img' => $ruta.'/images/hair.jpg',
            'id_distribution' => '1',
        ]);

        DB::table('products')->insert([
            'name' => 'Sauna',
            'description' => "Whether after sporting activities, before jumping into the pool or just tike that: recharge your batteries and relax. Here in the “Post” you can sweat in a noble ambience. In the sauna with a view of nature or in the brine steam bath with outdoor grotto. Finish your relaxation and deceleration stay in the spacious post-relaxation oases.",
            'img' => $ruta.'/images/spa.png',
            'id_distribution' => '1',
        ]);

        DB::table('products')->insert([
            'name' => 'Bike tours',
            'description' => "No matter if you’re on a road bike, mountain bike or e-bike, cycling tours with like-minded people make the whole experience more enjoyable. Our passionate guides know all the best training roads, MTB trails and have all the vital local knowledge to help make the most of your time on Gran Canaria. Not only that, but they also provide motivation and encouragement to ensure your cycling holiday is unforgettable.",
            'img' => $ruta.'/images/bicicleta.jpg',
            'id_distribution' => '1',
        ]);

        DB::table('products')->insert([
            'name' => 'Tennis court',
            'description' => "Whether you are a beginner or highly skilled tennis player, a game on one of our newly resurfaced hard-court tennis courts is bound to leave you feeling revived and refreshed. The tennis courts are open during daylight hours and tennis rackets and balls are available",
            'img' => $ruta.'/images/tenis.jpg',
            'id_distribution' => '1',
        ]);

    }



}