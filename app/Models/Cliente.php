<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable=['nome'];


    public function rules(){
        return [
            'nome'=>'required|unique:clientes,nome,'.$this->id,
            
        ];
    }

    public function feedback(){
        return [
            'required'=>'O campo :attribute não pode estar vazio!',
        ];

    }
}
