<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutoEstoqueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_estoque', function (Blueprint $table) {
            $table->increments('pes_id');
            $table->integer('pes_pro_id')->unsigned();
            $table->integer('pes_qtd_reservada');
            $table->integer('pes_qtd_disponivel');
            $table->timestamps();
            
            //foreign key declarations
            $table->foreign('pes_pro_id')->references('pro_id')->on('produtos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto_estoque');
    }
}
