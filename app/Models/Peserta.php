<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $fillable = ['nama','nik', 'no_hp', 'alamat', 'tanggal_lahir'];
}
