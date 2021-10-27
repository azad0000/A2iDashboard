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
            $table->string('village_order');
            $table->string('city_order');
            $table->string('supply_order');
            $table->string('village_supply_order');
            $table->string('city_supply_order');
            $table->string('product_type');
            $table->integer('total_transaction');
            $table->integer('inter_commission');
            $table->integer('source_amount');
            $table->string('digital_center');
            $table->string('join_digital_center');
            $table->string('trans_digital_center');
            $table->string('others_center');
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
