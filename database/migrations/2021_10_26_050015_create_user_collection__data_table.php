<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCollectionDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_collection__data', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('division');
            $table->string('district');
            $table->string('sub_district');
            $table->integer('village_order');
            $table->integer('city_order');
            $table->integer('supply_order');
            $table->integer('village_supply_order');
            $table->integer('city_supply_order');
            $table->integer('product_type');
            $table->integer('total_transaction');
            $table->integer('inter_commission');
            $table->integer('source_amount');
            $table->integer('digital_center');
            $table->integer('join_digital_center');
            $table->integer('trans_digital_center');
            $table->integer('others_center');
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
        Schema::dropIfExists('user_collection__data');
    }
}
