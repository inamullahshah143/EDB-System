<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnder656PartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('under656_parts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('oem_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('application_id')->constrained('issuance_applications')->cascadeOnDelete();
            $table->foreignId('vehicle_id')->constrained('vehicles')->cascadeOnDelete();
            $table->string('respective_pct_heading');
            $table->string('part_name_description');
            $table->string('part_no');
            $table->string('name_of_sub-assy/assy');
            $table->string('input_qty');
            $table->string('no_of_units');
            $table->string('total_approved_qty/annum');
            $table->string('uom');
            $table->string('cd_raate_applicable');
            $table->string('percentage_index');
            $table->string('status_imports');
            $table->integer('status');
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
        Schema::dropIfExists('under656_parts');
    }
}