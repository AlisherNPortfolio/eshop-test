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
        Schema::create('category_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId("category_id")->constrained("categories");
            $table->string("name");
            $table->foreignId("lang_id")->constrained("languages", "code");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category_translations', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['lang_id']);
        });

        Schema::dropIfExists('category_translations');
    }
};
