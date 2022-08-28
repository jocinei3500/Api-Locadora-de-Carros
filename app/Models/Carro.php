<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Psy\CodeCleaner\FunctionContextPass;

class Carro extends Model
{
    use HasFactory;
    protected $fillable=
    ['modelo_id',
    'placa', 
    'disponivel',
    'km',
    ];

    public function rules(){
        return [
            'modelo_id'=>'exists:modelos,id',
            'placa'=>'required',
            'disponivel'=>'required|boolean',
            'km'=>'required|integer'
            
        ];
    }

    public function feedback(){
        return [
            'required'=>'O campo :attribute não pode estar vazio!',
            'integer'=>'O valor do :atribute precisa ser um número inteiro!',
            'boolean'=>' O valor do campo : attribute deve ser 1 ou 0'
        ];
    }



    public function modelo(){
        return $this->belongsTo('App\Models\modelo');
    }
}
