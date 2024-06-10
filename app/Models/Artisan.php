<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artisan extends Model
{
    protected $primaryKey = 'CIN';
    public $incrementing = false;
    protected $keyType = 'string';
    use HasFactory;
    public function apprentis(){
        return $this->belongsToMany(Apprenti::class,'stage','artisan_id','apprenti_id')->withPivot(['dateDebut','dateFin']);
    }
}
