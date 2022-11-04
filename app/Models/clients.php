<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clients extends Model
{
    use HasFactory;
    protected $table = 'clients';
    protected $guarded = [];

    public function payments() {
        return $this->hasMany(payments::class)->orderBy('created_at', 'ASC');
    }
}
