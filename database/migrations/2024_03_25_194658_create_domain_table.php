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
        Schema::create('domain', function (Blueprint $table) {
            $table->id();
            $table->string('domain');
            $table->unsignedBigInteger('publisher_id');
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('publisher_id')->references('id')->on('publisher');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('domain', function (Blueprint $table) {
            $table->dropForeign('publisher_id');
        
        });
        
        Schema::dropIfExists('domain');
    }
};
