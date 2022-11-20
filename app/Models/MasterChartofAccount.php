<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterChartofAccount extends Model
{
    use HasFactory;
    protected $table = "master_chart_of_account";
    protected $fillable = [
        "code",
        "name",
        "category"
    ];
}
