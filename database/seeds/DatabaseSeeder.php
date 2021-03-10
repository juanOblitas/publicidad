<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Template;
use App\Textsize;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        //Debemos crear primero el rol y luego el usuario
    	Role::create([
    		'name' => 'admin',
    	]);

        Role::create([
            'name' => 'client',
        ]);

    	User::create([
    		'name' => 'Juan Carlos Oblitas Nuñez',
    		'email' => 'jcoblitas86@gmail.com',
    		'password' => Hash::make('jaumebalmes'),
    		'role_id'=>1,
    	]);

        Template::create([
            'rows' => 2,        
            'columns' => 4,
        ]);

        $variable = array(0.9, 1, 1.1, 1.2, 1.3, 1.4, 1.5, 1.6, 1.7, 1.8, 1.9, 2);

        foreach ($variable as $key => $value) {
            Textsize::create([
                'size' => $value,
            ]);
        }

    }
}
