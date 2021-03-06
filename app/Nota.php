<?php

namespace App;
use App\Aluno;
use Illuminate\Database\Eloquent\Model;
class Nota extends Model{
    public $timestamps = false; /* Ignora os campos de criação e alteração banco de dados */
    //protected $fillable = ['nome,email,endereco'];
    protected $guarded = [];
    protected $table = 'tbl_notas';
    

    public function aluno(){
        return $this->belongsTo(Aluno::class);
    }

    public function turma(){
        return $this->belongsTo(Turma::class);
    }
}