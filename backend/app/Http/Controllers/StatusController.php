<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    protected function validation(){
        return [
            'descricao' => ['required','string','max:60'],
        ];

    }

    public function index(){
        foreach (Status::all() as $clients) {
            echo $clients->cpf;
        }
    }
    
    public function create(Request $request){
        $this->validate($request, $this->validation());
        Status::create($request->all());
        return "status salvo";
    }
    
    public function update(Request $request,$id){
        $this->validate($request,$this->validation());
        $clients = Status::find($id);

        $clients->update($request->all());
        $clients->save();
        return $request;
    }
}
