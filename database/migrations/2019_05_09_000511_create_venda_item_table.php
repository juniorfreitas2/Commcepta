<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendaItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venda_item', function (Blueprint $table) {
            $table->increments('vit_id');
            $table->integer('vit_vnd_id')->unsigned();
            $table->integer('vit_pro_id')->unsigned();
            $table->integer('vit_qtd');
            $table->decimal('vit_total_liquido',10,2);
            $table->decimal('vit_total_bruto',10,2);
            $table->decimal('vit_total_desconto',10,2);
            $table->timestamps();
            
            //foreign key declarations
            $table->foreign('vit_vnd_id')->references('vnd_id')->on('vendas');
            $table->foreign('vit_pro_id')->references('pro_id')->on('produtos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venda_item');
    }
}
