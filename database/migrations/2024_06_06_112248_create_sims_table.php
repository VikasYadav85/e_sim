<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('sims', function (Blueprint $table) {
            $table->id();
            $table->string('iccid')->nullable();
            $table->string('lpa')->nullable();
            $table->string('imsis')->nullable();
            $table->string('matching_id')->nullable();
            $table->string('qrcode')->nullable();
            $table->string('qrcode_url')->nullable();
            $table->string('airalo_code')->nullable();
            $table->string('apn_type')->nullable();
            $table->string('apn_value')->nullable();
            $table->string('is_roaming')->nullable();
            $table->string('confirmation_code')->nullable();

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
        Schema::dropIfExists('sims');
    }
};
