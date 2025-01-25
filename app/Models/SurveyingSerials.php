<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyingSerials extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'serial_no', 'condition'];

    public function parent()
    {
        return $this->belongsTo(Surveying::class, 'product_id');
    }
}
