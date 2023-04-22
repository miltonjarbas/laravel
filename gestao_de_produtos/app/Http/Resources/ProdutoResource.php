<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProdutoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            '_id' => $this->id,
            'nome' => $this->nome_produto,
            'custo' => $this->preco_custo,
            'venda' => $this->preco_venda,
            'min_estoque' => $this->estoque_minimo,
            'max_estoque' => $this->estoque_maximo,
            'descricao' => $this->descricao_produto,
            'total' => $this->soma($this->preco_custo, $this->preco_venda),
            'historico' => $this->produtoHistorico
        ];
    }

    public function soma($a, $b)
    {

        return $a + $b;
    }
}
