<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ref_code');
            $table->string('name');
            $table->integer('qty');
            $table->decimal('cost');
            $table->decimal('price');
            $table->decimal('subtotal');
            $table->integer('receipt_id');
            $table->string('status')->default('paid');
            $table->timestamps();
        });
        $statement = 'ALTER TABLE orders AUTO_INCREMENT = 10000000;';
        DB::unprepared($statement);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
