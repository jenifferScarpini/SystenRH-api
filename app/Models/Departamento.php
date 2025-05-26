<?php

namespace App\Models;
use App\Models\Funcionario;


use Illuminate\Database\Eloquent\Model;


class Departamento extends Model
{
    protected $table = 'departamentos';
    protected $fillable = ['name', 'description',];

    public function funcionarios(){
        return $this->hasMany(Funcionario::class,'departamento_id','id');
    }
}
