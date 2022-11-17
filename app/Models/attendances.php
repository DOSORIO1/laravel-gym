<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class attendances extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'attendances';
    protected $guarded = [];
}
