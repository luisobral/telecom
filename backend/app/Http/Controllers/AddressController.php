<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    protected function validation(){
        return [
            'rua' => ['required','string','max:100'],
            'numero' => ['integer','required'],
            'CEP' => ['required','string','size:8'],
            'bairro' =>  ['required','string','max:60'],
            'cidade' =>  ['required','string','max:60'],
            'estado' => ['required','string','size:2'],
            'Pais' => ['required','string','max:3'],
        ];

    }

    public function index(){
        foreach (Address::all() as $clients) {
            echo $clients->cpf;
        }
    }
    
    public function create(Request $request){
        $this->validate($request, $this->validation());
        Address::create($request->all());
        return "endereco salvo";
    }
    
    public function update(Request $request,$id){
        $this->validate($request,$this->validation());
        $clients = Address::find($id);

        $clients->update($request->all());
        $clients->save();
        return $request;
    }
}
