<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendaFormRequest;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function store(AgendaFormRequest $request){

        $agenda = Agenda::create([
           
            'nome' => $request->nome,
            'celular' => $request->celular,
            'e-mail' => $request->email,
            'cpf' => $request->cpf,
            'DatadeNascimento' => $request->DatadeNascimento,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'pais' => $request->pais,
            'rua' => $request->rua,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'cep' => $request->cep,
            'senha' => $request->senha


        ]);
        return response()->json([
            "success" => true,
            "message" => "Cliente Cadastrado com sucesso",
            "data" => $agenda

        ], 200);
    }

    public function pesquisarPorIdAgenda($id)
    {
        $agenda = Agenda::find($id);

        if ($agenda == null) {
            return response()->json([
                'status' => false,
                'message' => "Agenda não cadastrado"
            ]);
        }
        return response()->json([
            ' status' => true,
            'data' => $agenda
        ]);
    }

    public function retornarTodosAgenda()
    {
        $agenda = Agenda::all();
        return response()->json([
            ' status' => true,
            'data' => $agenda
        ]);
    }

   
    public function pesquisarPorClienteAgenda(Request $request)
    {
        $agenda = Agenda::where('nome', 'like', '%' . $request->nome . '%')->get();

        if (count($agenda) > 0) {
            return response()->json([
                ' status' => true,
                'data' => $agenda
            ]);
        }
    }
    public function excluirAgenda($id)
    {
        $agenda = Agenda::find($id);

        if (!isset($agenda)) {
            return response()->json([
                'status' => false,
                'message' => "Agenda não Sencontrado"
            ]);
        }

        $agenda->deleteAgenda();
        return response()->json([
            'status' => true,
            'message' => "Agenda excluido com sucesso"
        ]);
    }

    public function updateCliente(Request $request)
    {
        $agenda = Agenda::find($request->id);
        if (!isset($agenda)) {
            return response()->json([
                'status' => false,
                'message' => "Agenda não encontrado"
            ]);
        }

        if (isset($request->id)) {
            $agenda->id = $request->id;
        }

        if (isset($request->nome)) {
            $agenda->nome = $request->nome;
        }
        if (isset($request->celular)) {
            $agenda->celular = $request->celular;
        }
        if (isset($request->email)) {
            $agenda->email = $request->email;
        }
        if (isset($request->cpf)) {
            $agenda->cpf = $request->cpf;
        }
        if (isset($request->DatadeNascimento)) {
            $agenda->DatadeNascimento = $request->DatadeNascimento;
        }
        if (isset($request->cidade)) {
            $agenda->cidade = $request->cidade;
        }
        


        $agenda->update();

        return response()->json([
            'status' => true,
            'message' => 'Agenda atualizado.'
        ]);
    }

}
