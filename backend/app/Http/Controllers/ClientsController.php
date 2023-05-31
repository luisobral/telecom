<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    protected function validation(){
        return [
            'nome' => ['required','string','max:100'],
            'cpf' => ['integer','digits:11','required']
        ];

    }

    public function index(){
        foreach (Clients::all() as $clients) {
            echo $clients->cpf;
        }
    }
    
    public function create(Request $request){
        $validacao = $this->validation();
        $validacao['cpf'][] = 'unique:clients';
        $this->validate($request, $validacao);
        Clients::create($request->all());
        return "cliente salvo";
    }
    
    public function update(Request $request,$id){
        $this->validate($request,$this->validation());
        $clients = Clients::find($id);

        $clients->update($request->all());
        $clients->save();
        return $request;
    }
}
