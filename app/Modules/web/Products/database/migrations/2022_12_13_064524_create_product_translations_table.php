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
        Schema::create('product_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId("product_id")->constrained("products");
            $table->string("name");
            $table->text("description");
            $table->string("lang_code", 2);
            $table->foreign("lang_code")->references("code")->on("languages");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_translations', function (Blueprint $table) {
            $table->dropForeign(["lang_code"]);
            $table->dropForeign(["product_id"]);
        });
        Schema::dropIfExists('product_translations');
    }
};
