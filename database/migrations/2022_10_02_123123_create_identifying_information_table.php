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
        Schema::create('identifying_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('phone_number');
            $table->string('citizenship');
            $table->string('house_number')->nullable();
            $table->string('street');
            $table->foreignId('barangay_id')->nullable()->constrained('barangays')->onDelete('cascade');
            $table->string('city_municipality');
            $table->string('province');
            $table->string('age');
            $table->string('gender');
            $table->string('civil_status');
            $table->string('religion');
            $table->string('birthdate');
            $table->string('birthplace');
            $table->string('educational_attainment')->nullable();
            $table->string('listahanan')->nullable();
            $table->string('pantawid_beneficiary')->nullable();
            $table->string('indigenous_people')->nullable();
            $table->string('senior_citizen_organization')->nullable();
            $table->string('others')->nullable();
            $table->string('osca')->nullable();
            $table->string('tin')->nullable();
            $table->string('gsis')->nullable();
            $table->string('sss')->nullable();
            $table->string('philhealth')->nullable();
            $table->string('id_number_others')->nullable();
            $table->string('living_arrangement');
            $table->string('status')->default(0);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('identifying_information');
    }
};
