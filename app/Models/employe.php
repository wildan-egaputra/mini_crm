<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    protected $table = 'employe';

    protected $fillable = [
        'nama_depan',
        'nama_belakang',
        'companies_id',
        'email',
        'phone',
        'divisi_id',
    ];

    public function company()
    {
        return $this->belongsTo(Companies::class, 'companies_id');
    }

    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'divisi_id');
    }


    public function divis()
    {
        return $this->belongsToMany(Divisi::class, 'divisi_employe');
    }
}
