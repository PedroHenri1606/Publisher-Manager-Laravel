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
        Schema::create("revenue_domain", function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedBigInteger("domain_id");
            $table->bigInteger("impressions");
            $table->integer("cpm");
            $table->integer("cpc");
            $table->integer("rpm");
            $table->integer("ctr");
            $table->integer("clicks");
            $table->integer("revenue");

            $table->foreign("domain_id")->references("id")->on("domains");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('revenue_domain', function (Blueprint $table){
            $table->dropForeign('revenue_domain_domain_id_foreign');
        });

        Schema::dropIfExists('revenue_domain');
    }
};
