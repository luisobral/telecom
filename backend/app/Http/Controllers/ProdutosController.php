<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    protected function validation(){
        return [
            'codigo' => ['required','integer'], 
            'descricao' => ['required','string','max:60'], 
            'garantia' => ['required','integer'], 
            'status_id' => ['required','integer']
        ];

    }

    public function index(){
        foreach (Produtos::all() as $clients) {
            echo $clients->cpf;
        }
    }
    
    public function create(Request $request){
        $this->validate($request, $this->validation());
        Produtos::create($request->all());
        return "produto salvo";
    }
    
    public function update(Request $request,$id){
        $this->validate($request,$this->validation());
        $clients = Produtos::find($id);

        $clients->update($request->all());
        $clients->save();
        return $request;
    }
}
