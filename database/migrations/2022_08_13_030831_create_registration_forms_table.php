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
        Schema::create('registration_forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name');
            $table->string('place_of_birth');
            $table->string('age');
            $table->string('civil_status');
            $table->string('date_of_birth');
            $table->string('sex');
            $table->string('address');
            $table->string('educational_attainment')->nullable();
            $table->string('other_skills')->nullable();
            $table->string('u1_fullname')->nullable();
            $table->string('u1_relationship')->nullable();
            $table->string('u1_age')->nullable();
            $table->string('u1_status')->nullable();
            $table->string('u1_occupation')->nullable();
            $table->string('u2_fullname')->nullable();
            $table->string('u2_relationship')->nullable();
            $table->string('u2_age')->nullable();
            $table->string('u2_status')->nullable();
            $table->string('u2_occupation')->nullable();
            $table->string('u3_fullname')->nullable();
            $table->string('u3_relationship')->nullable();
            $table->string('u3_age')->nullable();
            $table->string('u3_status')->nullable();
            $table->string('u3_occupation')->nullable();
            $table->string('u4_fullname')->nullable();
            $table->string('u4_relationship')->nullable();
            $table->string('u4_age')->nullable();
            $table->string('u4_status')->nullable();
            $table->string('u4_occupation')->nullable();
            $table->string('u5_fullname')->nullable();
            $table->string('u5_relationship')->nullable();
            $table->string('u5_age')->nullable();
            $table->string('u5_status')->nullable();
            $table->string('u5_occupation')->nullable();
            $table->string('name_of_association');
            $table->string('address_of_association');
            $table->string('date_of_membership');
            $table->string('position');
            $table->string('sc_picture');
            $table->string('sc_document');
            $table->string('sc_pres_signature');
            $table->string('sc_signature');
            $table->string('status')->default('0');
            $table->string('allowed_level')->default('0');
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
        Schema::dropIfExists('registration_forms');
    }
};
