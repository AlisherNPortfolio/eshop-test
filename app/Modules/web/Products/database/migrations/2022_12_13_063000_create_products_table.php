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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("sku", 8);
            $table->integer("in_stock_qty");
            $table->enum("stock_status", ["N", "S", "O"])->comment("NEW, SALE, ORDINARY");
            $table->foreignId("brand_id")->constrained('brands');
            $table->foreignId("category_id")->constrained('categories');
            $table->decimal("price", 10, 2);
            $table->string("unique_name")->unique();
            $table->tinyInteger("status")->default(0);
            $table->timestamps();

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
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['brand_id']);
            $table->dropForeign(['category_id']);
            $table->dropIndex(['unique_name']);
        });

        Schema::dropIfExists('products');
    }
};
