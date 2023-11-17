<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiAlt extends Model
{
    protected $table = 'nilai_alt';

    protected $fillable = 
    [
        'kode_alternatif',
        'kode_kriteria',
        'value', 
    ];

    public function getKodeKriteriaAsStringAttribute()
    {
        return 'C' . $this->attributes['kode_kriteria'];
    }
    public function getKodeAlternatifAsStringAttribute()
    {
        return 'A' . $this->attributes['kode_alternatif'];
    }
    public function alternatif() 
	{
	return $this->belongsTo(Alternatif::class,'kode_alternatif');
	}
    public function kriteria() 
	{
	return $this->belongsTo(Kriteria::class,'kode_kriteria');
	}
}
