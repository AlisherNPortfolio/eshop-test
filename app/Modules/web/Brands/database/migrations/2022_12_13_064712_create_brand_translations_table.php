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
        Schema::create('brand_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId("brand_id")->constrained('brands');
            $table->foreignId("lang_id")->constrained("languages", "code");
            $table->string("name");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('brand_translations', function (Blueprint $table) {
            $table->dropForeign(['brand_id', 'lang_id']);
        });
        Schema::dropIfExists('brand_translations');
    }
};
