<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(UsersTableSeeder::class);
        //$this->call(PasswordResetsTableSeeder::class);
        //$this->call(PatientsTableSeeder::class);

        //$this->call(StaffTableSeeder::class);
        //$this->call(PositionsTableSeeder::class);
        //$this->call(ReceptionsTableSeeder::class);

        //$this->call(RecipesTableSeeder::class);
        //$this->call(PositionHasStaffSeeder::class);
        //$this->call(DiagnosesTableSeeder::class);

        //$this->call(ServicesTableSeeder::class);
        //$this->call(NewsTableSeeder::class);

        Model::reguard();
    }

}
class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert(['email' => 'mau3@mail.ru',
            'password' => bcrypt('1111'),
            'surname' => 'Udalov',
            'firstName' => 'Matvey',
            'secondName' => 'Alexandrovich',
            'phoneNumber' => '44-55-01',
            'dob' => '1995-07-14',
            'address' => 'Shumakova street',
            'isAdmin' => true]);
        DB::table('users')->insert(['email' => 'user@mail.ru',
            'password' => bcrypt('1111'),
            'surname' => 'Ivanov',
            'firstName' => 'Ivan',
            'secondName' => 'Ivanovich',
            'phoneNumber' => '44-55-01',
            'dob' => '1995-10-10',
            'address' => 'Ivanova street',
            'isAdmin' => false]);
    }
}
