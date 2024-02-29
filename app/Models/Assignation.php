<?php

namespace App\Models;

use App\Models\User;
use App\Models\Fonction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Assignation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fonction_id',
        'date_debut',
        'date_fin'
    ];

    public $incrementing = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function fonction()
    {
        return $this->belongsTo(Fonction::class, 'fonction_id');
    }

    public function getActiveAttribute()
    {
        return $this->date_debut <= date("Y-m-d") && $this->date_fin >= date("Y-m-d");
    }
}
