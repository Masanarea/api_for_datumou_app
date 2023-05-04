<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sentence extends Model
{
    use HasFactory;
    protected $table = 't_spinach_reference_sentence';
    // 複数代入対策
    protected $guarded = ['id', 'sort_no'];
}
