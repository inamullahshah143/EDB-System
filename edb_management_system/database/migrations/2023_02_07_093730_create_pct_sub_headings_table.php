<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePctSubHeadingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pct_sub_headings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pct_heading_id')->constrained('pct_headings')->cascadeOnDelete();
            $table->double('sub_pct_heading',8,4)->unique();
            $table->string('description',3000)->nullable();
            $table->decimal('cd_rate', 16, 2);
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
        Schema::dropIfExists('pct_sub_headings');
    }
}
