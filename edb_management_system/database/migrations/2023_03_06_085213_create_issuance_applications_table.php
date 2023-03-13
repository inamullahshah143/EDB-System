<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuanceApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issuance_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('oem_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('vehicle_id')->constrained('vehicles')->cascadeOnDelete();
            $table->string('tracking_id');
            $table->foreignId('list_of_plant_id')->constrained('files')->cascadeOnDelete();
            $table->foreignId('brand_detail_id' )->constrained('files')->cascadeOnDelete();
            $table->foreignId('list_of_vendor_id')->constrained('files')->cascadeOnDelete();
            $table->foreignId('parts_catalogue_id')->constrained('files')->cascadeOnDelete();
            $table->foreignId('lease_agreement_id')->constrained('files')->cascadeOnDelete();
            $table->date('lease_agreement_validity');
            $table->string('application_status');
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
        Schema::dropIfExists('issuance_applications');
    }
}
