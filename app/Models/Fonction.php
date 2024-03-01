<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fonction extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'libelle'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'assignations', 'fonction_id', 'user_id')
        ->withPivot('date_debut', 'date_fin');
    }
}
