<?php

use Illuminate\Database\Seeder;
use App\Movie as Movie;
use App\User as User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        self::seedCatalog();
        $this->command->info('Tabla catálogo inicializada con datos!');
    }
    
    private function seedCatalog()
    {
        $this->arrayPeliculas = array(
            '0'=>array(
            'title'=>'La Guerra de las Galaxias',
            'year'=>'2000',
            'director'=>'George Lucas',
            'poster'=>'imag1',
            'rented'=>true,
            'synopsis'=>'Pelicula de Jei',
        ),
        '1'=>array(
            'title'=>'Titanic',
            'year'=>'1998',
            'director'=>'Cameronn james',
            'poster'=>'imag1',
            'rented'=>false,
            'synopsis'=>'Pelicula sobre tragedia maritima',
        ),
        '2'=>array(
            'title'=>'Matriz',
            'year'=>'2001',
            'director'=>'Unknow',
            'poster'=>'imag1',
            'rented'=>true,
            'synopsis'=>'Pelicula sobre mundo virtual',
        )
        );
        DB::table('movies')->delete();
        foreach( $this->arrayPeliculas as $pelicula ) {
            $p = new Movie;
            $p->title = $pelicula['title'];
            $p->year = $pelicula['year'];
            $p->director = $pelicula['director'];
            $p->poster = $pelicula['poster'];
            $p->rented = $pelicula['rented'];
            $p->synopsis = $pelicula['synopsis'];
            $p->save();
        }
        
        User::create([
            'name' => 'sergio',
            'email' => 'sergiopleon@gmail.com',
            'password' => bcrypt('sergio'),
        ]);
    }
}
