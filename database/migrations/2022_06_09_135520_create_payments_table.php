<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_income');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')
                ->references('t_id')
                ->on('payment_types')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->smallInteger('amount')->unsigned();
            $table->string('comment')->default('-');
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
        Schema::dropIfExists('payments');
    }
}
