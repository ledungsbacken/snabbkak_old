<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Ingredient;

use Laravel\Scout\Searchable;

class Recepie extends Model
{
    use Searchable;

    public $asYouType = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'user_id'
    ];

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();
        foreach($this->ingredients as  $index => $ingredient) {
            $array['name_' . $index] = $ingredient->name;
        }
        return $array;
    }

    public function searchableAs()
    {
        return 'recepies_index';
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function ingredients() {
        return $this->hasMany(Ingredient::class);
    }

}
