<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Learn extends Model
{
    public function User(){
        return $this->belongsTo(User::class);
    }
    use HasFactory;
    protected $primaryKey = 'id_jadwal';
}
