<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;


class VeiculosController extends Controller
{
    public function index() {
        $veiculos = Veiculo::where('user_id', Auth::id())->get();
        return view('veiculos.index', array('veiculos' => $veiculos, 'busca'=>null));
    }



    public function show($id) {
        $veiculo = Veiculo::find($id);
        return view('veiculos.show', array('veiculo' => $veiculo));
    }

    public function create(){
        return view('veiculos.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'marca' => 'required',
            'modelo' => 'required',
            'versao' => 'required'
        ]);
        $veiculo = new Veiculo();
        $veiculo->marca = $request->input('marca');
        $veiculo->modelo = $request->input('modelo');
        $veiculo->versao = $request->input('versao');
        $veiculo->manutencao = $request->input('manutencao');
        if($veiculo->manutencao == 1) {
            $veiculo->data_manutencao = $request->input('data');
        } else {
            $veiculo->manutencao = 0;
            $veiculo->data_manutencao = null;
        }
        $veiculo->user_id = Auth::user()->id;
        if($veiculo->save()) {
            return redirect('veiculos');
        } else {
           return;
        }

    }

    public function update($id, Request $request) {
        $veiculo = Veiculo::find($id);
        $this->validate($request, [
            'marca' => 'required',
            'modelo' => 'required',
            'versao' => 'required'
        ]);
        $veiculo->marca = $request->input('marca');
        $veiculo->modelo = $request->input('modelo');
        $veiculo->versao = $request->input('versao');
        $veiculo->manutencao = $request->input('manutencao');
        if($veiculo->manutencao == 1) {
            $veiculo->data_manutencao = $request->input('data');
        }  else {
            $veiculo->manutencao = 0;
            $veiculo->data_manutencao = null;
        }
        $veiculo->save();
        Session::flash('mensagem', 'Dados alterados com sucesso.');
        return redirect('veiculos');
    }

    public function edit($id){
        $veiculo = Veiculo::find($id);
        return view('veiculos.edit', array('veiculo' => $veiculo));

    }

    public function destroy($id) {
        $veiculo = Veiculo::find($id);
        $veiculo->delete();
        Session::flash('mensagem', 'Veículo excluído com sucesso');
        return redirect('veiculos');
    }

    public function buscar(Request $request){
        $veiculos = Veiculo::where('marca', 'LIKE', '%'.$request->input('busca').'%')
            ->orwhere('modelo', 'LIKE', '%'.$request->input('busca').'%')->paginate(4);
        return view('veiculos.index', array('veiculos' => $veiculos, 'busca'=>$request->input('busca')));
    }
}
