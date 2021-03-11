<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['email','text', 'link', 'created_at','user_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function uploadFile($image)
    {
        if ($image == null) {
            return;
        }
        if ($this->image != null) {
            Storage::delete($this->image);
        }
        $filename = Str::random(10) . '.' . $image->extension();
        $image->storeAs('public/uploads', $filename);
        $this->image = $filename;
        $this->save();
    }
}
