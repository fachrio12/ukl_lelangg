<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class masyarakat extends Model
{
    protected $table ='masyarakat';
    public $timestamps =false;

    protected $fillable =['nama','username','password','tlp'];
}