<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Aluno extends Model{
    public $timestamps = false; /* Ignora os campos de criação e alteração banco de dados */
    //protected $fillable = ['nome,email,endereco'];
    protected $guarded = [];

    protected $table = 'tbl_alunos'; 

    public function notas(){
        return $this->hasMany(Nota::class);
    }

}