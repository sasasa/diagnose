<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'question_template_id',
        'point',
        'user_id',
    ];

    public function questionTemplate()
    {
        return $this->belongsTo(QuestionTemplate::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
