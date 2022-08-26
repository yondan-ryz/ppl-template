<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sma extends Model
{

    use HasFactory;
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'logo',
        'visi',
        'misi',
        'alamat',
        'sejarah',
        'makelogo',
    ];


}
