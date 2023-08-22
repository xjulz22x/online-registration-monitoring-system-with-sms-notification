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
        Schema::create('assesments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('date_submitted');
            $table->longText('assesment')->nullable();
            $table->string('authorized_representative_name_1')->nullable();
            $table->string('authorized_representative_relation_1')->nullable();
            $table->string('authorized_representative_name_2')->nullable();
            $table->string('authorized_representative_relation_2')->nullable();
            $table->string('authorized_representative_name_3')->nullable();
            $table->string('authorized_representative_relation_3')->nullable();
            $table->string('interviewed_by')->nullable();
            $table->string('dswd_e_signature')->nullable();
            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('assesments');
    }
};
