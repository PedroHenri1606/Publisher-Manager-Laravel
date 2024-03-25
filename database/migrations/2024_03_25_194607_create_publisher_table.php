<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('publisher', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('document');
            $table->string('password');
            $table->unsignedBigInteger('role_id');
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('publisher', function (Blueprint $table){
            $table->dropForeign('role_id');
        });
        
        Schema::dropIfExists('publisher');
    }
};