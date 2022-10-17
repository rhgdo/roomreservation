<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropUserIdToReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            // 外部キー制約の削除
            $table->dropForeign('reservations_user_id_foreign');
            // カラム削除
            $table->dropColumn('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            // カラムの追加
            $$table->unsignedBigInteger('user_id');
            // 外部キーの追加
            $table->foreign('user_id')->references('id')->on('users');
        });
    }
}
