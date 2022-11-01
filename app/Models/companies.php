<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class companies extends Model
{
    use HasFactory;
    protected $table = 'companies';
    protected $guarded = [];

    public function rates(){
        return $this->hasMany(rates::class);
    }
}
