<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'institution', 'title', 'start', 'end', 'description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return string
     */
    public function getFullFormatDateAttribute()
    {
        $start = date("Y", strtotime( $this->start) );
        $end =  date("Y", strtotime( $this->end) );
        $fullDate = $start . ' - ' . $end;
        return $fullDate;
    }
}

