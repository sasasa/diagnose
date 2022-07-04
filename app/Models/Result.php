<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'point',
        'user_id',
        'result_template_id',
    ];

    public function resultTemplate()
    {
        return $this->belongsTo(ResultTemplate::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
