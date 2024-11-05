<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Import ini
use Illuminate\Notifications\Notifiable; // Jika menggunakan notifikasi
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable 
{
    use HasFactory;
    protected $fillable = [
        'username',
        'email',
        'password',
    ];
    public function categories()
{
    return $this->hasMany(Category::class);
}

public function tasks()
{
    return $this->hasMany(Task::class);
}

}
