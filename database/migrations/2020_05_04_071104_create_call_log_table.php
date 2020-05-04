<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('call_log', function (Blueprint $table) {
            $table->id();
            $table->timestamp('created_at');
            $table->unsignedBigInteger('contact_id');
        });

        Schema::table('call_log', function (Blueprint $table) {
            $table->foreign('contact_id')
                ->references('id')
                ->on('contacts')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('call_log', function (Blueprint $table) {
            //
        });
    }
}
