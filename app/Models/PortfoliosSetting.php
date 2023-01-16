<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfoliosSetting extends Model
{
    protected $fillable = [
        'locale',
        'portfolios_uptitle',
        'portfolios_title',
        'portfolios_count'
    ];
}
