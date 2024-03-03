<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Radio;

class RadioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // SLAM
        Radio::create([
            'name' => 'SLAM! Hardstyle',
            'url' => 'https://stream.slam.nl/web11_mp3',
            'description' => 'Landelijke Zenders',
            'image' => '48668_radio.png',
        ]);

        Radio::create([
            'name' => 'SLAM! 40',
            'url' => 'https://stream.slam.nl/web14_mp3',
            'description' => 'Landelijke Zenders',
            'image' => '40216_radio.png',
        ]);

        Radio::create([
            'name' => 'SLAM! Non-Stop',
            'url' => 'https://stream.slam.nl/web10_mp3',
            'description' => 'Landelijke Zenders',
            'image' => '10500_radio.png',
        ]);

        Radio::create([
            'name' => 'SLAM! The Boom Room',
            'url' => 'https://stream.slam.nl/web12_mp3',
            'description' => 'Landelijke Zenders',
            'image' => '15685_radio.png',
        ]);

        Radio::create([
            'name' => 'SLAM! Housuh in de Pauzuh',
            'url' => 'https://stream.slam.nl/web16_mp3',
            'description' => 'Landelijke Zenders',
            'image' => '62732_radio.png',
        ]);

        Radio::create([
            'name' => 'SLAM! Dance Classics',
            'url' => 'https://stream.slam.nl/web15_mp3',
            'description' => 'Landelijke Zenders',
            'image' => '873_radio.png',
        ]);

        Radio::create([
            'name' => 'SLAM! MixMarathon',
            'url' => 'https://stream.slam.nl/web13_mp3',
            'description' => 'Landelijke Zenders',
            'image' => '17856_radio.png',
        ]);

        Radio::create([
            'name' => 'SLAM! Juize',
            'url' => 'https://stream.slam.nl/web09_mp3',
            'description' => 'Landelijke Zenders',
            'image' => '2006_radio.png',
        ]);

        Radio::create([
            'name' => 'SLAM! Live',
            'url' => 'https://stream.slam.nl/slam_mp3',
            'description' => 'Landelijke Zenders',
            'image' => '64704_radio.png',
        ]);

        // NBPO
        Radio::create([
            'name' => 'NPO Radio 1',
            'url' => 'https://icecast.omroep.nl/radio1-bb-mp3',
            'description' => 'NPO',
            'image' => '40858_radio.png',
        ]);

        Radio::create([
            'name' => 'NPO Radio 2',
            'url' => 'https://icecast.omroep.nl/radio2-bb-mp3',
            'description' => 'NPO',
            'image' => '31686_radio.png',
        ]);

        Radio::create([
            'name' => 'NPO Radio 2 Soul & Jazz',
            'url' => 'https://icecast.omroep.nl/radio6-bb-mp3',
            'description' => 'NPO',
            'image' => '82463_radio.png',
        ]);

        Radio::create([
            'name' => 'NPO Sterren.nl',
            'url' => 'https://icecast.omroep.nl/radio2-sterrennl-mp3',
            'description' => 'NPO',
            'image' => '99130_radio.png',
        ]);

        Radio::create([
            'name' => 'NPO 3FM',
            'url' => 'https://icecast.omroep.nl/3fm-bb-mp3',
            'description' => 'NPO',
            'image' => '27937_radio.png',
        ]);

        Radio::create([
            'name' => 'NPO 3FM Alternative',
            'url' => 'https://icecast.omroep.nl/3fm-alternative-mp3',
            'description' => 'NPO',
            'image' => '99593_radio.png',
        ]);

        Radio::create([
            'name' => 'NPO Campus Radio',
            'url' => 'https://icecast.omroep.nl/3fm-serioustalent-mp3',
            'description' => 'NPO',
            'image' => '19156_radio.png',
        ]);

        Radio::create([
            'name' => 'NPO Klassiek',
            'url' => 'https://icecast.omroep.nl/radio4-bb-mp3',
            'description' => 'NPO',
            'image' => '86157_radio.png',
        ]);

        Radio::create([
            'name' => 'NPO Radio 5',
            'url' => 'https://icecast.omroep.nl/radio5-bb-mp3',
            'description' => 'NPO',
            'image' => '38795_radio.png',
        ]);

        Radio::create([
            'name' => 'NPO Blend',
            'url' => 'https://icecast.omroep.nl/npoblend-bb-mp3',
            'description' => 'NPO',
            'image' => '18532_radio.png',
        ]);

        // FUNX
        Radio::create([
            'name' => 'FunX NL',
            'url' => 'https://icecast.omroep.nl/funx-bb-mp3',
            'description' => 'NPO',
            'image' => '36518_radio.png',
        ]);

        Radio::create([
            'name' => 'FunX Afro',
            'url' => 'https://icecast.omroep.nl/funx-reggae-bb-mp3',
            'description' => 'NPO',
            'image' => '70085_radio.png',
        ]);

        Radio::create([
            'name' => 'FunX Arab Radio',
            'url' => 'https://icecast.omroep.nl/funx-arab-bb-mp3',
            'description' => 'NPO',
            'image' => '45737_radio.png',
        ]);

        Radio::create([
            'name' => 'FunX Fissa',
            'url' => 'https://icecast.omroep.nl/funx-dance-bb-mp3',
            'description' => 'NPO',
            'image' => '18725_radio.png',
        ]);

        Radio::create([
            'name' => 'FunX Hip Hop',
            'url' => 'https://icecast.omroep.nl/funx-hiphop-bb-mp3',
            'description' => 'NPO',
            'image' => '44170_radio.png',
        ]);

        Radio::create([
            'name' => 'FunX Latin',
            'url' => 'https://icecast.omroep.nl/funx-latin-bb-mp3',
            'description' => 'NPO',
            'image' => '73311_radio.png',
        ]);

        Radio::create([
            'name' => 'FunX Slow Jamz',
            'url' => 'https://icecast.omroep.nl/funx-slowjamz-bb-mp3',
            'description' => 'NPO',
            'image' => '32577_radio.png',
        ]);

        Radio::create([
            'name' => 'FunX Amsterdam',
            'url' => 'https://icecast.omroep.nl/funx-amsterdam-bb-mp3',
            'description' => 'NPO',
            'image' => '82721_radio.png',
        ]);

        Radio::create([
            'name' => 'FunX Den Haag',
            'url' => 'https://icecast.omroep.nl/funx-denhaag-bb-mp3',
            'description' => 'NPO',
            'image' => '30425_radio.png',
        ]);

        Radio::create([
            'name' => 'FunX Rotterdam',
            'url' => 'https://icecast.omroep.nl/funx-rotterdam-bb-mp3',
            'description' => 'NPO',
            'image' => '79861_radio.png',
        ]);

        Radio::create([
            'name' => 'FunX Utrecht',
            'url' => 'https://icecast.omroep.nl/funx-utrecht-bb-mp3',
            'description' => 'NPO',
            'image' => '30311_radio.png',
        ]);

        // 538
        Radio::create([
            'name' => '538 Radio',
            'url' => 'https://playerservices.streamtheworld.com/api/livestream-redirect/RADIO538.mp3',
            'description' => 'Landelijke Zenders',
            'image' => '24795_radio.png',
        ]);

        Radio::create([
            'name' => '538 Classics',
            'url' => 'https://playerservices.streamtheworld.com/api/livestream-redirect/TLPSTR08.mp3',
            'description' => 'Landelijke Zenders',
            'image' => '91324_radio.png',
        ]);

        Radio::create([
            'name' => '538 Dance Dept.',
            'url' => 'https://playerservices.streamtheworld.com/api/livestream-redirect/TLPSTR01.mp3',
            'description' => 'Landelijke Zenders',
            'image' => '68701_radio.png',
        ]);

        Radio::create([
            'name' => '538 Hitzone',
            'url' => 'https://playerservices.streamtheworld.com/api/livestream-redirect/TLPSTR11.mp3',
            'description' => 'Landelijke Zenders',
            'image' => '14049_radio.png',
        ]);

        Radio::create([
            'name' => '538 Ibiza',
            'url' => 'https://playerservices.streamtheworld.com/api/livestream-redirect/TLPSTR19.mp3',
            'description' => 'Landelijke Zenders',
            'image' => '52922_radio.png',
        ]);

        Radio::create([
            'name' => '538 Non-Stop',
            'url' => 'https://playerservices.streamtheworld.com/api/livestream-redirect/TLPSTR13.mp3',
            'description' => 'Landelijke Zenders',
            'image' => '50301_radio.png',
        ]);

        Radio::create([
            'name' => '538 Party',
            'url' => 'https://playerservices.streamtheworld.com/api/livestream-redirect/TLPSTR16.mp3',
            'description' => 'Landelijke Zenders',
            'image' => '23234_radio.png',
        ]);

        Radio::create([
            'name' => '538 Top 50',
            'url' => 'https://playerservices.streamtheworld.com/api/livestream-redirect/TLPSTR13.mp3',
            'description' => 'Landelijke Zenders',
            'image' => '65971_radio.png',
        ]);

        Radio::create([
            'name' => '538 Die Verrückte',
            'url' => 'https://playerservices.streamtheworld.com/api/livestream-redirect/TLPSTR21.mp3',
            'description' => 'Landelijke Zenders',
            'image' => '86238_radio.png',
        ]);

        Radio::create([
            'name' => '538 Zomer',
            'url' => 'https://playerservices.streamtheworld.com/api/livestream-redirect/TLPSTR06.mp3',
            'description' => 'Landelijke Zenders',
            'image' => '5493_radio.png',
        ]);
    }
}
