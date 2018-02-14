<?php

namespace Bantenprov\JPWajibKTP\Models\Bantenprov\JPWajibKTP;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JPWajibKTP extends Model
{

    protected $table = 'jumlah_penduduk_wajib_ktps';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('negara', 'province_id', 'kab_kota', 'regency_id', 'tahun', 'data');

    public function getProvince()
    {
        return $this->hasOne('Bantenprov\JPWajibKTP\Models\Bantenprov\JPWajibKTP\Province','id','province_id');
    }

    public function getRegency()
    {
        return $this->hasOne('Bantenprov\JPWajibKTP\Models\Bantenprov\JPWajibKTP\Regency','id','regency_id');
    }

}

