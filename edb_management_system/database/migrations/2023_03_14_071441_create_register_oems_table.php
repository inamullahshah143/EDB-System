<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterOemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_oems', function (Blueprint $table) {
            $table->id();
            $table->foreignId('oem_id')->constrained('users')->cascadeOnDelete();
            $table->string('phone');
            $table->string('secp_registration_no');
            $table->string('ntn_no');
            $table->string('strn_no');
            $table->string('product_brand');
            $table->string('poc');
            $table->string('poc_cell');
            $table->string('contact');
            $table->string('registration_address');
            $table->string('factory_address');
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
        Schema::dropIfExists('register_oems');
    }
}
