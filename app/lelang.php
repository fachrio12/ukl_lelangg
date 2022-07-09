<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lelang extends Model
{
    protected $table ='lelang';
    public $timestamps =false;

    protected $fillable =['id_barang','tgl_lelang','harga_akhir','id_petugas','status','id_masyarakat'];
}
