<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingArtist extends Model
{
    use HasFactory;

    protected $fiillable = [
        'fullname',
        'email',
        'country',
        'phone_number',
        'portfolio_link',
        'bio',
        'application_status'
    ];
}
