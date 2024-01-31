<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use Maatwebsite\Excel\Facades\Excel;

use App\Models\User;
use App\Imports\UsersImport;
use App\Helpers\ManipularString;
use App\Helpers\ManipularArray;


class DesafioController extends Controller
{
    public function inverterString(Request $request) {

        $stringParaConverter = $request->input('string_inverter');

        if(is_string($stringParaConverter)) {

            $manipularString = new ManipularString();

            $retorno = [
                'status' => 'sucesso',
                'mensagem' => 'String invertida com sucesso!',
                'data' => $manipularString->inverterString($stringParaConverter),
            ];
        }
        else {
            $retorno = [
                'status' => 'erro',
                'mensagem' => 'Erro ao inverter string.',
            ];
        }
        return response()->json($retorno);
        
    }

    public function dobrarNumeros(Request $request) {

        $manipularArray = new ManipularArray();
        $numerosDobrados = $manipularArray->dobrarNumeros($request->dobrar_numeros);

        if(is_array($numerosDobrados)) {

            $retorno = [
                'status' => 'sucesso',
                'mensagem' => 'Array manipulada com sucesso!',
                'data' => $numerosDobrados,
            ];           
        }
        else {
            $retorno = [
                'status' => 'erro',
                'mensagem' => 'Erro ao manipular array.'
            ];
        }
        
        return response()->json($retorno);
        
    }

    public function contarLinhasArquivo(Request $request) {

        $array = Excel::toArray(new UsersImport, request()->file('csvFile'));
        $totalArray = (count($array[0]) - 1);

        if($totalArray > 0) {
            $response = [
                'status' => 'sucesso',
                'total_linhas' => $totalArray,
            ];
        } else {
            $response = [
                'status' => 'erro',
                'mensagem' => 'Arquivo vazio ou incorreto..',
            ];
        }

        return response()->json($response);
        
    }

    public function apresentarUsuario(Request $request) {

        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users',
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            $response = [
                'status' => 'erro',
                'mensagem' => 'E-mail já cadastrado no banco.'
            ];  
        }
        else {

            $user = new User;
    
            $user->name = $request->input('name');
            $user->idade = $request->input('idade');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
    
            $user->save();
    
            $response = [
                'status' => 'sucesso',
                'data' => $user->apresentar()
            ];  

        }

        return response()->json($response);

    }

    public function buscarUsuarios() {

        $manipularArray = new ManipularArray();
        $arrayAssociativa = $manipularArray->converterParaAssociativa( User::all() );

        if($arrayAssociativa) {
            $response = [
                'status' => 'sucesso',
                'data' => $arrayAssociativa
            ];        
        }
        else {
            $response = [
                'status' => 'erro',
                'mensagem' => 'Erro ao converter para associativa.'
            ];        
        }

        return response()->json($response);

    }
}
