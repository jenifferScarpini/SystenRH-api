<?php

namespace App\Models;
use App\Models\Departamento;


use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = 'funcionarios';
    protected $fillable = ['name', 'departamento_id',];

    public function departamento(){
        return $this->belongsTo(Departamento::class, 'departamento_id','id');
    }
}
