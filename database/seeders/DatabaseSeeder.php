<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;
use Symfony\Component\VarDumper\Caster\DoctrineCaster;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Doctor::truncate();

        $doktor1 = new Doctor();
        $doktor1->nameSurname = "Mirko Spasic";
        $doktor2 = new Doctor();
        $doktor2->nameSurname = "Ana Jovic";
        $doktor3 = new Doctor();
        $doktor3->nameSurname = "Jelena Markovic";
        $doktor4 = new Doctor();
        $doktor4->nameSurname = "Stefan Pocuca";
        
        $doktor1->save();
        $doktor2->save();
        $doktor3->save();
        $doktor4->save();

        User::truncate();

        // User::create([
        //     'name' => 'stanmil',
        //     'email' => 'milance.za019@gmail.com',
        //     'password' => '123abc',
        // ],
        // [
        //     'name' => 'majaelab',
        //     'email' => 'maja@elab.rs',
        //     'password' => 'abc123',
        // ],
        // [
        //     'name' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => 'admin',
        // ]);

        User::factory(3)->create();

        Appointment::truncate();

        Appointment::create([
            'department' => 'Torakalno',
            'room' => 401,
            'date' => '2023-02-14',
            'user_id' => 1,
            'doctor_id' => 1,
        ]);
    }
}
