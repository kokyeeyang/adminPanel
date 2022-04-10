<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Company extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['name', 'email', 'website'];

    public function employees(){
        return $this->hasMany(Employee::class );
    }
}
