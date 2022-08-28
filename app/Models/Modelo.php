<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;

    protected $fillable=['marca_id', 'nome', 'imagem', 'numero_portas',
     'lugares', 'air_bag', 'abs'];

    public function rules(){
        return [
            'marca_id'=>'exists:marcas,id',
            'nome'=>'required|unique:modelos,nome,'.$this->id.'|min:3',
            'imagem'=>'required|file|mimes:png,jpg,jpeg',
            'numero_portas'=>'required|integer|between:1,5',
            'lugares'=>'required|integer|between:1,20',
            'air_bag'=>'required|boolean',
            'abs'=>'required|boolean'
            
        ];
 
    }

    public function feedback(){
        return [
            'required'=>'O campo :attribute não pode estar vazio!',
            'unique'=>'Já existe um :attribute com esse nome!',
            'min'=>'O :attribute deve ter pelo menos 3 caracteres',
            'mimes'=>'A Imagem precisa ser no formato png',
            'exists'=>'A :attribute não existe na tabela marcas',
            'integer'=>'O valor do :atribute precisa ser um número inteiro!',
            'between'=>'O campo :attribute deve ser valor de 1 a 5',
            'between'=>'O campo :attribute deve ser valor de 1 a 20',
            'boolean'=>' O valor do campo : attribute deve ser 1 ou 0'
        ];

    }

    public function marca(){
        //Vários modelos pertencema uma marca
        return $this->belongsTo('App\Models\Marca');
    }

    public function carros(){
        return $this->hasMany('App\Models\carro');
    }
}
