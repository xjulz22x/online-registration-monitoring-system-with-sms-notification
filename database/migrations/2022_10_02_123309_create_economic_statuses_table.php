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
        Schema::create('economic_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('pensioner');
            $table->string('pensioner_if_yes')->nullable();
            $table->string('source');
            $table->string('source_others')->nullable();
            $table->string('permanent_source_of_income');
            $table->string('permanent_source_of_income_if_yes')->nullable();
            $table->string('regular_support_from_family');
            $table->string('type_of_support_cash');
            $table->string('type_of_support_in_kind');
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
        Schema::dropIfExists('economic_statuses');
    }
};
