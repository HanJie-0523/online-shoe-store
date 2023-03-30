<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    //user_role: user - role (many to many)
    public function users(){
        return $this->belongsToMany(User::class, 'user_role');//<-pivot table name
    }
}
