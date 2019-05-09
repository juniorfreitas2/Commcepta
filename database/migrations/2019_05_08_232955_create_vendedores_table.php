<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendedores', function (Blueprint $table) {
            $table->increments('ven_id');
            $table->integer('ven_end_id')->unsigned();
            $table->string('ven_nome', 150);
            $table->string('ven_cpf', 14);
            $table->string('ven_sexo', 1);
            $table->date('ven_nascimento');
            $table->string('ven_telefone', 20)->nullable();
            $table->string('ven_celular', 20)->nullable();
            $table->string('ven_email', 150)->nullable();
            $table->boolean('ven_ativo')->default(1);
            $table->longtext('ven_observacao')->nullable();
            $table->timestamps();

            //foreign key declarations
            $table->foreign('ven_end_id')->references('end_id')->on('enderecos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendedores');
    }
}
