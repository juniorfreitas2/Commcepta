<?php

use Illuminate\Database\Seeder;
use App\Models\Produto;
use App\Models\ProdutoEstoque;
use App\Models\Vendedor;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $product = Produto::create([
            'pro_nome' => 'Televisao',
            'pro_valor' => '450.00',
            'pro_max_desconto' => '5'
        ]);

        ProdutoEstoque::create([
            'pes_pro_id' => $product->pro_id,
            'pes_qtd_reservada' => 0,
            'pes_qtd_disponivel' => 6
        ]);

        $product = Produto::create([
            'pro_nome' => 'Mesa',
            'pro_valor' => '340.00',
            'pro_max_desconto' => '5'
        ]);

        ProdutoEstoque::create([
            'pes_pro_id' => $product->pro_id,
            'pes_qtd_reservada' => 0,
            'pes_qtd_disponivel' => 100
        ]);

        $product = Produto::create([
            'pro_nome' => 'Cozinha itatiaia',
            'pro_valor' => '999.99',
            'pro_max_desconto' => '10'
        ]);

        ProdutoEstoque::create([
            'pes_pro_id' => $product->pro_id,
            'pes_qtd_reservada' => 0,
            'pes_qtd_disponivel' => 200
        ]);

        $product = Produto::create([
            'pro_nome' => 'Iphone 6s ',
            'pro_valor' => '2900.00',
            'pro_max_desconto' => '10'
        ]);

        ProdutoEstoque::create([
            'pes_pro_id' => $product->pro_id,
            'pes_qtd_reservada' => 0,
            'pes_qtd_disponivel' => 499
        ]);

        Vendedor::create([
            'ven_nome'=> 'Junior Freitas',
            'ven_cpf' => '60710576390',
            'ven_sexo' => 'M',
            'ven_nascimento' => '1996-03-14',
            'ven_ativo'=> 1
        ]);
    }
}
