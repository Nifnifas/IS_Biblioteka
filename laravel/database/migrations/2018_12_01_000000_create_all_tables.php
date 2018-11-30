<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atlyginimas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date')->nullable();
            $table->float('tarifas', 5, 2)->nullable();
            $table->integer('valandu_sk')->nullable();
            $table->float('psd_mokesciai', 6, 2)->nullable();
            $table->float('ismokamas', 6, 2)->nullable();
            $table->float('apskaiciuotas', 6, 2)->nullable();
            $table->float('premija', 6, 2)->nullable();
            $table->unsignedInteger('fk_darbuotojasID');
        });
		
        Schema::create('bilietas', function (Blueprint $table) {
            $table->increments('id');
            $table->float('kaina', 5, 2)->nullable();
            $table->integer('eile')->nullable();
            $table->integer('vieta')->nullable();
            $table->unsignedInteger('fk_klientasID');
            $table->unsignedInteger('fk_renginysID');
        });
		
        Schema::create('darbuotojas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vardas', 20)->nullable();
            $table->string('pavarde', 20)->nullable();
            $table->string('tel_nr', 12)->nullable();
            $table->string('adresas', 100)->nullable();
            $table->date('isidarbinimo_data')->nullable();
            $table->integer('asmens_kodas')->nullable();
            $table->string('el_pastas', 100)->nullable();
            $table->integer('sukaupta_atostogu')->nullable();
            $table->enum('statusas', array('Dirba','Atostogauja','Nedirba','Biuletenis'))->nullable();
        });
		
        Schema::create('direktorius', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vardas', 20)->nullable();
            $table->string('pavarde', 20)->nullable();
            $table->string('tel_nr', 12)->nullable();
            $table->string('adresas', 100)->nullable();
            $table->string('el_pastas', 100)->nullable();
        });
		
        Schema::create('egzempliorius', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kodas',30)->unique();
            $table->date('ivedimo_data')->nullable();
            $table->unsignedInteger('fk_kurinysID');
        });
		
        Schema::create('klientas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vardas', 20)->nullable();
            $table->string('pavarde', 20)->nullable();
            $table->string('tel_nr', 12)->nullable();
            $table->string('adresas', 100)->nullable();
            $table->integer('taskai')->nullable();
            $table->date('registracijos_data')->nullable();
            $table->date('gimimo_data')->nullable();
        });
		
        Schema::create('komentaras', function (Blueprint $table) {
            $table->increments('id');
            $table->text('tekstas')->nullable();
            $table->datetime('data')->nullable();
            $table->unsignedInteger('fk_kurinysID');
            $table->unsignedInteger('fk_klientasID');
        });
		
        Schema::create('kurinys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pavadinimas', 50)->nullable();
            $table->string('autorius', 50)->nullable();
            $table->integer('isleidimo_metai')->nullable();
            $table->enum('tipas', array('Knyga','Periodinis leidinys','Kartografija','Natos','Vaizdinis dokumentas','Garsinis dokumentas'))->nullable();
            $table->text('aprasymas')->nullable();
        });
		
        Schema::create('lengvata', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tasku_kiekis')->nullable();
            $table->enum('tipas', array('Skolos','Renginio'))->nullable();
            $table->unsignedInteger('fk_klientasID');
        });
		
        Schema::create('lentynos_zyma', function (Blueprint $table) {
            $table->unsignedInteger('fk_klientasID');
            $table->unsignedInteger('fk_kurinysID');
        });
		
        Schema::create('renginys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pavadinimas', 50)->nullable();
            $table->date('data')->nullable();
            $table->string('organizatorius', 50)->nullable();
            $table->integer('vietu_skaicius')->nullable();
            $table->integer('organizatoriaus_tel_nr')->nullable();
            $table->enum('tipas', array('Seminaras','Skaitymas','Susitikimas','Koncertas','Paroda','Minėjimas'))->nullable();
            $table->unsignedInteger('fk_direktoriusID');
        });
		
        Schema::create('rezervacija', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data')->nullable();
            $table->integer('prioritetas')->nullable();
            $table->unsignedInteger('fk_klientasID');
            $table->unsignedInteger('fk_kurinysID');
        });
		
        Schema::create('skola', function (Blueprint $table) {
            $table->increments('id');
            $table->float('dydis', 5, 2)->nullable();
            $table->float('procentalumas', 4, 3)->nullable();
            $table->date('grazinimo_data')->nullable();
            $table->unsignedInteger('fk_sutartisID');
        });
		
        Schema::create('sutartis', function (Blueprint $table) {
            $table->increments('id');
            $table->date('sudarymo_data')->nullable();
            $table->date('isdavimo_data')->nullable();
            $table->date('grazinimo_data')->nullable();
            $table->integer('terminas')->nullable();
            $table->unsignedInteger('fk_klientasID');
        });
		
        Schema::create('sutartis_egzempliorius', function (Blueprint $table) {
            $table->unsignedInteger('fk_egzemplioriusID');
            $table->unsignedInteger('fk_sutartisID');
        });
		
        Schema::create('vertinimas', function (Blueprint $table) {
            $table->increments('id');
            $table->float('vertinimas', 3, 1)->nullable();
            $table->unsignedInteger('fk_kurinysID');
            $table->unsignedInteger('fk_klientasID');
        });
		
		// ADD CONSTRAINTS
		
        Schema::table('atlyginimas', function (Blueprint $table) {
			$table->foreign('fk_darbuotojasID')->references('id')->on('darbuotojas');
        });
        Schema::table('bilietas', function (Blueprint $table) {
			$table->foreign('fk_klientasID')->references('id')->on('klientas');
			$table->foreign('fk_renginysID')->references('id')->on('renginys');
        });
        Schema::table('egzempliorius', function (Blueprint $table) {
			$table->foreign('fk_kurinysID')->references('id')->on('kurinys');
        });
        Schema::table('komentaras', function (Blueprint $table) {
			$table->foreign('fk_klientasID')->references('id')->on('klientas');
			$table->foreign('fk_kurinysID')->references('id')->on('kurinys');
        });
        Schema::table('lengvata', function (Blueprint $table) {
			$table->foreign('fk_klientasID')->references('id')->on('klientas');
        });
        Schema::table('lentynos_zyma', function (Blueprint $table) {
			$table->foreign('fk_klientasID')->references('id')->on('klientas');
			$table->foreign('fk_kurinysID')->references('id')->on('kurinys');
        });
        Schema::table('renginys', function (Blueprint $table) {
			$table->foreign('fk_direktoriusID')->references('id')->on('direktorius');
		});
        Schema::table('rezervacija', function (Blueprint $table) {
			$table->foreign('fk_klientasID')->references('id')->on('klientas');
			$table->foreign('fk_kurinysID')->references('id')->on('kurinys');
        });
        Schema::table('skola', function (Blueprint $table) {
			$table->foreign('fk_sutartisID')->references('id')->on('sutartis');
        });
        Schema::table('sutartis', function (Blueprint $table) {
			$table->foreign('fk_klientasID')->references('id')->on('klientas');
        });
        Schema::table('sutartis_egzempliorius', function (Blueprint $table) {
			$table->foreign('fk_sutartisID')->references('id')->on('sutartis');
			$table->foreign('fk_egzemplioriusID')->references('id')->on('egzempliorius');
        });
        Schema::table('vertinimas', function (Blueprint $table) {
			$table->foreign('fk_klientasID')->references('id')->on('klientas');
			$table->foreign('fk_kurinysID')->references('id')->on('kurinys');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		// istrinti tvarka pagal constraints (pirmiausia tos lenteles, i kurias nera fk)
		
        Schema::dropIfExists('atlyginimas');
        Schema::dropIfExists('bilietas');
        Schema::dropIfExists('darbuotojas');
        Schema::dropIfExists('komentaras');
        Schema::dropIfExists('lengvata');
        Schema::dropIfExists('lentynos_zyma');
        Schema::dropIfExists('renginys');
        Schema::dropIfExists('rezervacija');
        Schema::dropIfExists('skola');
        Schema::dropIfExists('sutartis_egzempliorius');
        Schema::dropIfExists('vertinimas');
        Schema::dropIfExists('direktorius');
        Schema::dropIfExists('egzempliorius');
        Schema::dropIfExists('kurinys');
        Schema::dropIfExists('sutartis');
        Schema::dropIfExists('klientas');
    }
}
