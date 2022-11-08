<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class clients extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'clients';
    protected $guarded = [];

    public function payments() {
        return $this->hasMany(payments::class)->orderBy('created_at', 'ASC');
    }
}
