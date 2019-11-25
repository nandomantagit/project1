<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['nama_depan','nama_belakang','jenis_kelamin','agama','alamat','user_id','avatar'];

    public function getAvatar() 
    {
        if(!$this->avatar){
            return asset('images/default.png');
        }
        return asset('images/'.$this->avatar);
    }

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class)->withPivot(['nilai'])->withTimeStamps();
    }

    public function rataRataNilai()
    {
        //ambil nilai
        If($this->mapel->isNotEmpty()) {
        $total = 0;
        $hitung = 0;
        foreach($this->mapel as $mapel){
            $total += $mapel->pivot->nilai;
            $hitung++;
        }
        return round($total/$hitung);
        }
        return 0;
    }

    public function nama_lengkap()
    {
        return $this->nama_depan.' '.$this->nama_belakang;
    }

}