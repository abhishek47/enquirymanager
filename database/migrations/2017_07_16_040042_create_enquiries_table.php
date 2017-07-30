<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquiries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('company_id');
            $table->string('name');
            $table->string('phone');
            $table->text('address');
            $table->date('buy_date');
            $table->date('contact_date');
            $table->string('occupation');
            $table->integer('payment_type');
            $table->integer('vehicle_id');
            $table->double('vehicle_cost');
            $table->string('vehicle_color');
            $table->double('rto_charges');
            $table->double('insuarance_charges');
            $table->double('hpa_charges');
            $table->double('total');

            $table->integer('status')->default(-1);

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
        Schema::dropIfExists('enquiries');
    }
}
