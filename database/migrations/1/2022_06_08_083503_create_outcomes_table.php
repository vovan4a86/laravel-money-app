<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutcomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outcomes', function (Blueprint $table) {
            $table->id('out_id');
            $table->boolean('is_income')->default(false);
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')
                ->references('id')
                ->on('outcome_types')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('comment');
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
        Schema::dropIfExists('outcomes');
    }
}
