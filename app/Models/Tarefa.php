<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Tarefa extends Model
{
    use HasFactory;
    protected $table = 'tarefas';
    protected $fillable = ['tarefa', 'data_limite_conclusao', 'user_id'];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
