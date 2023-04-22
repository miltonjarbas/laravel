<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoProduto extends Model
{
    use HasFactory;

    protected $table = 'historico_produtos';

    public $timestamps = true;

    protected $hidden = [
        'created_at',
        'updated_at',
        'is_delete'
    ];

    protected $guarded = [
        'created_at',
        'updated_at',
        'is_delete'
    ];

    protected $fillable = array(
        'produto_id',
        'nome_campo',
        'valor_antigo',
        'valor_novo',
        'id_user',

    );

    public function Produto()
    {
        return $this->belongsTo(Produto::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
