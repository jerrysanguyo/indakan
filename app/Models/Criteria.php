<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;

    protected $table='criterias';
    protected $fillable = [
        'name',
        'added_by',
        'updated_by',
    ];

    public static function getAllCriteria()
    {
        return self::all();
    }

    public function createdBy() 
    {
        return $this->belongsTo(User::class, 'added_by');
    }

    public function updatedBy() 
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
