<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJPWajibKTPTable extends Migration {

	public function up()
	{
		Schema::create('jumlah_penduduk_wajib_ktps', function(Blueprint $table) {
			$table->increments('id');
			$table->string('negara', 191);
			$table->integer('province_id')->unsigned()->nullable()->index();
			$table->boolean('kab_kota')->index();
			$table->integer('regency_id')->unsigned()->nullable()->index();
			$table->string('tahun', 191);
			$table->decimal('data')->index();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('jumlah_penduduk_wajib_ktps');
	}
}