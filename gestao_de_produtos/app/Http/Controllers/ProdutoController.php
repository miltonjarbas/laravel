<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProdutoCollection;
use App\Http\Resources\ProdutoResource;
use App\Models\HistoricoProduto;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProdutoController extends Controller
{
    public function index(Produto $produto): ProdutoCollection
    {
        return new ProdutoCollection($produto->all());
    }

    public function show(Produto $produto, int $id): ProdutoResource|Response
    {
        $produto = $produto->find($id);
        if ($produto === null) {
            return response()->json(['msg' => 'Recurso pesquisado não existe!'], 404);
        }
        return new ProdutoResource($produto);
    }

    public function update(Request $request, int $id): ProdutoResource|Response
    {
        $produto =  new Produto();
        $produto = $produto->find($id);
        if ($produto === null) {
            return response()->json(['msg' => 'Não foi possivel atualizar!'], 404);
        }
        $produto->update($request->all());
        return new ProdutoResource($produto);
    }

    public function store(Request $request, Produto $produto): ProdutoResource|Response
    {
        $request->validate([
            'nome_produto' => 'required|unique:produtos',
            'descricao_produto' => 'required',
            'unidade_id' => 'required'
        ], [
            'required' => 'O campo :attribute é obrigatorio',
            'nome_produto.unique' => 'O nome do produto já existe'
        ]);

        $produto = $produto->create($request->all());
        return new ProdutoResource($produto);
    }


    public function destroy(Produto $produto, int $id)
    {
        $produto = $this->$produto->find($id);
        if ($produto === null) {
            return response()->json(['msg' => 'Não foi possivel apagar o produto!'], 404);
        }
        $produto->delete();
        return response()->json(['msg' => 'O produto foi removido com sucesso!'], 200);
    }
 
}
