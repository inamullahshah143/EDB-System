<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSro693sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sro693s', function (Blueprint $table) {
            $table->id();
            $table->double('pct_heading', 8, 4)->unique();
            $table->string('description', 3000)->nullable();
            $table->decimal('cd_rate', 16, 2);
            $table->decimal('acd_rate', 16, 2);
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
        Schema::dropIfExists('sro693s');
    }
}