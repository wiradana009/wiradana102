<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = "pasien";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','nama','alamat','tempat_lahir','tgl_lahir','gender', 'phone_email'
    ];
}
