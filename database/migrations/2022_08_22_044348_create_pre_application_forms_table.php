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
        Schema::create('pre_application_forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('mothers_maiden_name');
            $table->string('monthly_income');
            $table->string('total_person_in_the_house');
            $table->string('senior_picture_1x1');
            $table->string('barangay_indigency');
            $table->string('birth_cert_or_others');
            $table->string('senior_citizen_id');
            $table->string('senior_signature');
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
        Schema::dropIfExists('pre_application_forms');
    }
};
