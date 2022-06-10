<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->id('in_id');
            $table->boolean('is_income')->default(true);
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')
                ->references('id')
                ->on('income_types')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('comment')->default('-');
            $table->smallInteger('amount')->unsigned();
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
        Schema::dropIfExists('incomes');
    }
}
