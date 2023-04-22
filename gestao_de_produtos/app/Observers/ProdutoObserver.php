<?php

namespace App\Observers;

use App\Models\HistoricoProduto;
use App\Models\Produto;

class ProdutoObserver
{

    public $afterCommit = true;
    /**
     * Handle the Produto "created" event.
     *
     * @param  \App\Models\Produto  $produto
     * @return void
     */
    public function created(Produto $produto)
    {
        //
    }

    /**
     * Handle the Produto "updated" event.
     *
     * @param  \App\Models\Produto  $produto
     * @return void
     */
    public function updated(Produto $produto)
    {

        foreach ($produto->getDirty() as $field => $valor_novo) {
            $valor_antigo = $produto->getOriginal($field);
            if ($valor_novo !== $valor_antigo) {
                if ($field !== 'updated_at' && $field !== 'created_at') {
                    $historico = new HistoricoProduto();
                    $historico->produto_id = $produto->id;
                    // $historico->user_id = auth()->user()->id; // aqui você pode usar o ID do usuário autenticado na sua aplicação
                    $historico->nome_campo = $field;
                    $historico->valor_antigo = $valor_antigo;
                    $historico->valor_novo = $valor_novo;
                    $historico->save();
                }
            }
        }
    }

    /**
     * Handle the Produto "deleted" event.
     *
     * @param  \App\Models\Produto  $produto
     * @return void
     */
    public function deleted(Produto $produto)
    {
        //
    }

    /**
     * Handle the Produto "restored" event.
     *
     * @param  \App\Models\Produto  $produto
     * @return void
     */
    public function restored(Produto $produto)
    {
        //
    }

    /**
     * Handle the Produto "force deleted" event.
     *
     * @param  \App\Models\Produto  $produto
     * @return void
     */
    public function forceDeleted(Produto $produto)
    {
        //
    }
}
