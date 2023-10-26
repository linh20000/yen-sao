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
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo');
            $table->string('address');
            $table->string('time');
            $table->string('email');
            $table->string('hotline');
            $table->string('video');
            $table->string('network_fb');
            $table->string('network_ins');
            $table->string('network_tiktok');
            $table->string('network_shopee');
            $table->longText('google_map');
            $table->string('seo_title');
            $table->string('seo_description');
            $table->string('seo_keyword');
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
        Schema::dropIfExists('profile');
    }
};
