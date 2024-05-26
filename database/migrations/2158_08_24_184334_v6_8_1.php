<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class V681 extends Migration
{
    public function up()
    {
        Schema::create('model_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('profile_pic')->nullable();
            $table->string('name');
            $table->string('country');
            $table->string('city');
            $table->enum('status', ['online', 'offline'])->default('offline');
            // Add other relevant details here
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('model_profiles');
    }
}
