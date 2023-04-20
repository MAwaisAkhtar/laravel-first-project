<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class signup extends Model
{
    use HasFactory,Notifiable;
    // use Notifiable;
    
    protected $fillable=['Name','Email','Password','R_Password','token','email_verified_at','verified'];

    // protected function Name(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn (string $value) => ucfirst($value),
    //     );
    // }

    protected function Name(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
            set: fn (string $value) => strtolower($value),
        );
    }

}
