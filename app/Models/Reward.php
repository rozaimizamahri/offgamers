<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    use HasFactory;

    protected $table = 'rewards';
    protected $connection = 'mysql';
    public $incrementing = true;
    public $timestamps = false;

    protected $guarded = [];
}
