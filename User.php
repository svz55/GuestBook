<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Relation
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function changeStatus()
    {
        if ($this->status == 0) {
            $this->status = 1;
        } else {
            $this->status = 0;
        }
        $this->save();
        return $this->status;
    }

    public function getImageAttribute($image)
    {
        if ($image == null) {
            return 'uploads/no-avatar.jpg';
        }
        return 'uploads/' . $image;
    }

    public function uploadImage($image)
    {
        if ($image == null) {
            return;
        }
        if ($this->image != null) {
            Storage::delete($this->image);
        }
        $filename = str_random(10) . '.' . $image->extension();
        $image->storeAs('uploads', $filename);
        $this->image = $filename;
        $this->save();
    }

    public function editUser($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function generatePassword($password)
    {
        if ($password != null) {
            $this->password = bcrypt($password);
            $this->save();
        }
    }


}
