<?php

namespace Database\Seeders;

use App\Models\Entrie;
use App\Models\Padlet;
use App\Models\Comment;
use App\Models\Rating;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DateTime;


class PadletsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     *@returnvoid
     */
    public function run()
    {
        $padlet1 = new Padlet();
        $padlet1->name = "Web";
        $padlet1->is_public = true;
        $padlet1->user_id = 1;
        $padlet1->save();

        $padlet2 = new Padlet();
        $padlet2->name = "FH Hagenberg";
        $padlet2->is_public = true;
        $padlet2->user_id = 2;
        $padlet2->save();

        $padlet3 = new Padlet();
        $padlet3->name = "Urlaub 2023";
        $padlet3->is_public = false;
        $padlet3->user_id = 2;
        $padlet3->save();


        // Entries zu Padlet hinzufügen
        $entry1 = new Entrie();
        $entry1->user_id = 2;
        $entry1->padlet_id = 2;
        $entry1->title = "Warum KWM toll ist";
        $entry1->content = "Die Universität Hagenberg ist eine renommierte technische Universität in Österreich und hat einen guten Ruf für ihre akademischen Programme und ihre praxisorientierte Ausbildung. Der Studiengang Kommunikation, Wissen, Medien an der Fakultät für Informatik, Kommunikation und Medien verbindet Kenntnisse aus den Bereichen der Informatik, Kommunikation und Medien, um eine umfassende Ausbildung in diesen Bereichen zu bieten.Der Studiengang soll den Studierenden ein breites Wissen und Verständnis von digitalen Technologien, Medienproduktion, Kommunikationsstrategien und deren Anwendung in verschiedenen Kontexten vermitteln. Durch die Verbindung von theoretischem Wissen und praktischen Fähigkeiten sollen die Studierenden in der Lage sein, die Herausforderungen der modernen Kommunikations- und Medienbranche zu meistern.";

        $entry2 = new Entrie();
        $entry2->user_id = 1;
        $entry2->padlet_id = 1;
        $entry2->title = "Erster Entry";
        $entry2->content = "Lorem Ipsum.";

        $padlet1->entries()->saveMany([$entry1, $entry2]);
        $padlet1->save();


        //comments und ratings zu den entries dazu geben
        $comment1 = new Comment();
        $comment1->user_id = 1;
        $comment1->entrie_id = 1;
        $comment1->comment = 'Super cooler Beitrag';
        $comment1->save();

        $rating1 = new Rating();
        $rating1->user_id = 1;
        $rating1->entrie_id = 1;
        $rating1->rating = 4;
        $rating1->save();

        $entry1->comment()->saveMany([$comment1]);
        $entry1->rating()->saveMany([$rating1]);
        $entry1->save();
    }
}

