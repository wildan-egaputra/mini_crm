<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class companies extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'logo',
        'website',
    ];

    /**
     * Boot method to attach event handlers.
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($company) {
            if ($company->logo) {
                Storage::delete($company->logo);
            }
        });
    }
}
