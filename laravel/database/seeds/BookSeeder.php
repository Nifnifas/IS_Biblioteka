<?php

use Illuminate\Database\Seeder;
use App\Book;
use App\BookCopy;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// KURINIAI
		
		Book::create(array(
			'pavadinimas' => 'Hamletas', 'autorius' => 'V. Šekspyras', 'isleidimo_metai' => 1601, 'tipas' => 'Knyga',
			'aprasymas' => 'Hamletas - Viljamo Šekspyro tragedija, viena žymiausių jo pjesių. Tragedijoje pasakojama, kaip Hamletas keršija Klaudijui, pamatęs savo tėvo - Klaudijaus brolio - vaiduoklį. Klaudijus nužudė savo brolį ir perėmė sostą, taip pat vedė savo mirusiojo brolio žmoną.',
		));
		Book::create(array(
			'pavadinimas' => 'Balta drobulė', 'autorius' => 'Antanas Škėma','isleidimo_metai' => 1987,'tipas' => 'Knyga',
			'aprasymas' => '-',
		));
		Book::create(array(
			'pavadinimas' => 'Nusikaltimas ir bausmė', 'autorius' => 'F. Dostojevskis', 'isleidimo_metai' => 1895,'tipas' => 'Knyga',
			'aprasymas' => '---',
		));
		
		// EGZEMPLIORIAI
		
		$date = date("Y-m-d");
		
		BookCopy::create(array('kodas' => str_random(10), 'ivedimo_data' => $date, 'fk_kurinysID' => 1,));
		BookCopy::create(array('kodas' => str_random(10), 'ivedimo_data' => $date, 'fk_kurinysID' => 1,));
		BookCopy::create(array('kodas' => str_random(10), 'ivedimo_data' => $date, 'fk_kurinysID' => 1,));
		BookCopy::create(array('kodas' => str_random(10), 'ivedimo_data' => $date, 'fk_kurinysID' => 2,));
		BookCopy::create(array('kodas' => str_random(10), 'ivedimo_data' => $date, 'fk_kurinysID' => 2,));
		BookCopy::create(array('kodas' => str_random(10), 'ivedimo_data' => $date, 'fk_kurinysID' => 2,));
		BookCopy::create(array('kodas' => str_random(10), 'ivedimo_data' => $date, 'fk_kurinysID' => 3,));
		BookCopy::create(array('kodas' => str_random(10), 'ivedimo_data' => $date, 'fk_kurinysID' => 3,));
		BookCopy::create(array('kodas' => str_random(10), 'ivedimo_data' => $date, 'fk_kurinysID' => 3,));
    }
}
