<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CLient extends Model
{
    use HasFactory;

    protected $fillable = ['first_name','last_name'];


    /**
     * @return HasMany
     */
    public function rents(): HasMany
    {
        return $this->hasMany(Rent::class);
    }
}
