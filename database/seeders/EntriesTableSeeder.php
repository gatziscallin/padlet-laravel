<?php

namespace Database\Seeders;

use App\Models\Entrie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DateTime;

class EntriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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

    }
}
