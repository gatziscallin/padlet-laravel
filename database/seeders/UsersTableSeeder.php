<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DateTime;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // user in datenbank anlegen
        $user1 = new User();
        $user1->firstName = "Lisa";
        $user1->lastName = "Maier";
        $user1->email = "lisa@maier.at";
        $user1->password = bcrypt('secret');
        $user1->image = "https://www.google.com/url?sa=i&url=https%3A%2F%2Funsplash.com%2Fde%2Fs%2Ffotos%2FPERSON&psig=AOvVaw0MLlmFHka9NOAGmOiZv85T&ust=1684059970340000&source=images&cd=vfe&ved=0CBEQjRxqFwoTCPid2bOK8v4CFQAAAAAdAAAAABAE";
        $user1->save();

        $user2 = new User();
        $user2->firstName = "Katrin";
        $user2->lastName = "Maier";
        $user2->email = "katrin@maier.at";
        $user2->password = bcrypt('secret');
        $user2->image = "https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.masslive.com%2Fpolitics%2F2021%2F11%2Fi-take-great-pride-in-being-a-trailblazer-delmaria-lopez-becomes-first-person-of-color-elected-to-chicopee-city-council-shares-goals.html&psig=AOvVaw0MLlmFHka9NOAGmOiZv85T&ust=1684059970340000&source=images&cd=vfe&ved=0CBEQjRxqFwoTCPid2bOK8v4CFQAAAAAdAAAAABAe";
        $user2->save();

        $user3 = new User();
        $user3->firstName = "Martin";
        $user3->lastName = "Manz";
        $user3->email = "martin@manz.at";
        $user3->password = bcrypt('secret');
        $user3->image = "https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.mnp.ca%2Fen%2Fpersonnel%2Fstuart-person&psig=AOvVaw0MLlmFHka9NOAGmOiZv85T&ust=1684059970340000&source=images&cd=vfe&ved=0CBEQjRxqFwoTCPid2bOK8v4CFQAAAAAdAAAAABAm";
        $user3->save();
    }
}
