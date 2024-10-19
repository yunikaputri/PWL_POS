<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAvatarToMUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('m_user', function (Blueprint $table) {
            $table->string('avatar')->nullable()->after('password'); // menambahkan kolom avatar setelah kolom password
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('m_user', function (Blueprint $table) {
            $table->dropColumn('avatar'); // menghapus kolom avatar jika rollback
        });
    }
}
