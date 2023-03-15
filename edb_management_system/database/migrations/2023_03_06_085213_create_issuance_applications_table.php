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
            $table->foreignId('technical_agreement_doc_id')->constrained('files')->cascadeOnDelete();
            $table->foreignId('purchase_doc_of_plant_id' )->constrained('files')->cascadeOnDelete();
            $table->foreignId('snaps_of_inhouse_facilities_id')->constrained('files')->cascadeOnDelete();
            $table->foreignId('copies_of_sales_tax_certificate_id')->constrained('files')->cascadeOnDelete();
            $table->foreignId('factory_map_id')->constrained('files')->cascadeOnDelete();
            $table->foreignId('manpower_break_up_id')->constrained('files')->cascadeOnDelete();
            $table->foreignId('address_of_factory_id')->constrained('files')->cascadeOnDelete();
            $table->foreignId('name_of_chief_executive_id')->constrained('files')->cascadeOnDelete();
            $table->date('technical_assistance_agreement');
            $table->date('purchase_doc_of_plant_validity');
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
