<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'phone_number', 'email', 'company', 'updated_at'];

    public function company(){
        return $this->belongsTo(Company::class, 'id');
    }

    public function selectAllEmployees(){
        return DB::table('employees AS E')
                ->join('companies AS C', 'E.company', '=', 'C.id')
                ->select(['E.*', 'C.name AS company_name'])
                ->orderBy('updated_at', 'DESC')
                ->paginate(10);
        
    }

    public function viewEmployee($id){
        return DB::table('employees AS E')
                ->join('companies AS C', 'E.company', '=', 'C.id')
                ->select(['E.*', 'C.name AS company_name'])
                ->where('E.id',$id)->first();
    }

    public static function viewEmployeeId($userId){
        return DB::table('employees')
               ->select('id')
               ->where('user_id', $userId)->first();
    }
}
