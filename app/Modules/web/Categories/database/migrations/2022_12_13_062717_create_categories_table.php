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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId("parent_id")->nullable()->constrained("categories");
            $table->string("unique_name")->unique();
            $table->tinyInteger("status")->default(0);
            $table->index("unique_name");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropIndex(["unique_name"]);
            $table->dropForeign(['parent_id']);
        });

        Schema::dropIfExists('categories');
    }
};
