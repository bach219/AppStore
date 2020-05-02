<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VpContacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vp_contacts', function (Blueprint $table) {
            $table->increments('con_id');
            $table->string('con_email');
            $table->string('con_name');
            $table->string('con_message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vp_contacts', function (Blueprint $table) {
            //
        });
    }
}
