<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Tutor extends Model{
    public $timestamps = false; /* Ignora os campos de criação e alteração banco de dados */
    //protected $fillable = ['nome,email,endereco'];
    protected $guarded = [];

    protected $table = 'tbl_tutores'; 

    public function turmas(){
        return $this->hasMany(Turma::class);
    }

}