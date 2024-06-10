<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apprenti extends Model
{
   protected $primaryKey = 'NumApprenti';
    use HasFactory;
    public function artisans(){
        return $this->belongsToMany(Artisan::class,'stage','apprenti_id','artisan_id')->withPivot(['dateDebut','dateFin']);
    }
}
