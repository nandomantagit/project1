<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';
    protected $fillable = ['nama', 'telpon', 'alamat'];

    public function getAvatar() 
    {
        if(!$this->avatar){
            return asset('images/default.png');
        }
        return asset('images/'.$this->avatar);
    }

    public function mapel()
    {
        return $this->hasMany(Mapel::class);
    }
}
