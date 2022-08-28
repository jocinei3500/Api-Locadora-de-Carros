<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    protected $fillable=['nome', 'imagem'];

    public function rules(){
        return [
            'nome'=>'required|unique:marcas,nome,'.$this->id,
            'imagem'=>'required|mimes:png',  
        ];
 
    }

    public function feedback(){
        return [
            'required'=>'O campo :attribute não pode estar vazio!',
            'unique'=>'Já existe um :attribute com esse nome!',
            'min'=>'O :attribute deve ter pelo menos 10 letras',
            'mimes'=>'A Imagem precisa ser no formato png'
        ];
    }

    public function modelos(){
        //Uma marca possui muitos modelos.
        return $this->hasMany('App\Models\Modelo');
    }
}
