<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\models\Cliente;
use App\models\Especie;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = DB::table("cliente AS c")
					->join("especie AS s", "c.especie", "=", "s.id")
					->select("c.nome_animal", "c.nome_dono", "c.id", "s.descricao AS especie")
					->get();
					
		$cliente = new Cliente ();
		$especies = Especie::All();
		
		
        return view("cliente.index", [
			"clientes" => $clientes,
			"cliente" => $cliente,
			"especies" => $especies
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->get("id") == ""){
			$cliente = new Cliente();
		}else{
			$cliente = Cliente::Find($request->get("id"));
		}
			
		
		$cliente->nome_animal = $request->get("nome_animal");
		$cliente->nome_dono = $request->get("nome_dono");
		$cliente->raca = $request->get("raca");
		$cliente->data_nascimento = $request->get("data_nascimento");
		$cliente->especie = $request->get("especie");
		
		$cliente->save();
		
		$request->Session()->flash("acao", "salvo");
		
		return redirect("/cliente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::Find($id);
		return response()->json([
			"nome_animal" => $cliente->nome_animal,
			"nome_dono" => $cliente->nome_dono,
			"raca" => $cliente->raca
		]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		
		$clientes = DB::table("cliente AS c")
					->join("especie AS s", "c.especie", "=", "s.id")
					->select("c.nome_animal", "c.nome_dono", "c.id", "s.descricao AS especie")
					->get();
					
        $clientes = Cliente::All();
		$cliente = Cliente::Find($id);
		$especies = Especie::All();
		
		
		return view("cliente.index", [
			"clientes" => $clientes,
			"cliente" => $cliente,
			"especies" => $especies
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        Cliente::Destroy($id);	
		$request->Session()->flash("acao", "excluido");
		return redirect("/cliente");
    }
}
