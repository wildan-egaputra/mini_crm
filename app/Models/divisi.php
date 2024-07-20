<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;

    protected $table = 'divisi';
    protected $fillable = ['name'];

    public function employes()
    {
        return $this->belongsToMany(Employe::class, 'divisi_employe', 'divisi_id', 'employe_id');
    }
}
