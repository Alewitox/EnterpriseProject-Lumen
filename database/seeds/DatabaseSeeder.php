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
        factory(App\Product::class, 10)->create();

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
}
