<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Level extends Model
{

    protected $fillable = [
        'order', 'title', 'description',
    ];

    /**
     * Products this supplier sell.
     *
     * @return HasMany
     */
    public function learningResources(): HasMany
    {
        return $this->hasMany(LearningResource::class);
    }
}
