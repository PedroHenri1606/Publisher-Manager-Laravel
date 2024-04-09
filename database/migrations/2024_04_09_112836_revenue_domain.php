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
            $table->decimal("cpm",3,2);
            $table->decimal("rpm",3,2);
            $table->double("revenue");
            $table->timestamps();

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
