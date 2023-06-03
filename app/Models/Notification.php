<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
	protected $fillable = [
        'title',
        'message',
		'image',
        'status'
    ];
	protected $appends = [
        'image_url',
    ];
	/* user profile image url */
	public function getImageUrlAttribute(): string
    {
        return $this->image ? asset('storage/notifications/'.$this->image)  : "";
    }
}
