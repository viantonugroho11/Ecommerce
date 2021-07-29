<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SettingApp extends Model
{
    protected $fillable = [
        'nama','alamat','notelp'
    ];
}
