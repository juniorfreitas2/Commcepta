<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->increments('vnd_id');
            $table->integer('vnd_ven_id')->unsigned();
            $table->enum('vnd_status', ['R','F']);
            $table->decimal('vnd_total_venda',10,2);
            $table->timestamps();
            
            //foreign key declarations
            $table->foreign('vnd_ven_id')->references('ven_id')->on('vendedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendas');
    }
}
