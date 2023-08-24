<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = [
        'updated_at',
    ];

    public function getUpdatedAtAttribute($value) {
        return Carbon::parse($value)->format('l jS \\of F Y h:i:s A');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
