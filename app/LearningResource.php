<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LearningResource extends Model
{

    protected $fillable = [
        'levelId', 'type', 'title', 'description', 'content', 'url', 'imageUrl'
    ];
    /**
     * Supplier of this product.
     *
     * @return BelongsTo
     */
    public function level(): BelongsTo
    {
        return $this->belongsTo(Level::class);
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'users_learning_resources');
    }
}
