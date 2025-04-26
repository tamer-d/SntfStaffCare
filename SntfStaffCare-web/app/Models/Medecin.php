<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Medecin extends Model
{
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cms()
    {
        return $this->belongsTo(Cms::class);
    }

    public function specialite()
    {
        return $this->belongsTo(Specialite::class);
    }
}
