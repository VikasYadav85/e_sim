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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('package_id')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('type')->nullable();
            $table->string('description')->nullable();
            $table->string('esim_type')->nullable();
            $table->integer('validity')->nullable();
            $table->string('package')->nullable();
            $table->string('data')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->string('ids')->nullable();
            $table->string('code')->nullable();
            $table->string('currency')->nullable();
            $table->string('manual_installation')->nullable();
            $table->string('qrcode_installation')->nullable();
            $table->string('installation_guide_en')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
