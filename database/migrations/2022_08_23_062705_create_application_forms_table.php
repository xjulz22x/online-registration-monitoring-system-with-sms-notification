<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('citizenship');
            $table->string('house_number')->nullable();
            $table->string('street');
            $table->string('barangay');
            $table->string('city_municipality');
            $table->string('province');
            $table->string('age');
            $table->string('gender');
            $table->string('civil_status');
            $table->string('birthdate');
            $table->string('birthplace');
            $table->string('living_arrangement');
            $table->string('pensioner');
            $table->string('pensioner_if_yes')->nullable();
            $table->string('source');
            $table->string('source_others')->nullable();
            $table->string('permanent_source_of_income');
            $table->string('permanent_source_of_income_if_yes')->nullable();
            $table->string('regular_support_from_family');
            $table->string('type_of_support_cash');
            $table->string('type_of_support_in_kind');
            $table->string('illness');
            $table->string('illness_if_yes')->nullable();
            $table->string('hospitalized');
            $table->string('date_submitted');
            $table->string('with_maintenance');
            $table->string('with_maintenance_if_yes')->nullable();
            $table->string('authorized_representative_name_1')->nullable();
            $table->string('authorized_representative_relation_1')->nullable();
            $table->string('authorized_representative_name_2')->nullable();
            $table->string('authorized_representative_relation_2')->nullable();
            $table->string('authorized_representative_name_3')->nullable();
            $table->string('authorized_representative_relation_3')->nullable();
            $table->string('received_by')->nullable();
            $table->longText('assesment')->nullable();
            $table->string('intervieded_by')->nullable();
            $table->string('dswd_e_signature')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('application_forms');
    }
};
