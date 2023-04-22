<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Produto extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    public $timestamps = true;

    protected $hidden = [
        'created_at',
        'updated_at',
        'is_deleted'
    ];

    protected $guarded = [
        'created_at',
        'updated_at',
        'is_delete',
    ];

    protected $fillable = array(
        'nome_produto',
        'descricao_produto',
        'preco_custo',
        'preco_venda',
        'estoque_minimo',
        'estoque_maximo',
        'unidade_id'
    );

    public function produtoHistorico()
    {
        return $this->hasMany(HistoricoProduto::class, 'produto_id', 'id')->orderBy('created_at', 'desc');
    }
}
