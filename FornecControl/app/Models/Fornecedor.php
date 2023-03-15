<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    // Here we define which fields can be mass-assigned using the fill() method.
    protected $fillable = ['nome', 'cpf_cnpj', 'data_cadastro', 'telefones', 'empresa_id'];

    // Here we define the name of the table associated with this model.
    protected $table = 'fornecedores';

    // Here we define the primary key of the table associated with this model.
    protected $primaryKey = 'id';
}
