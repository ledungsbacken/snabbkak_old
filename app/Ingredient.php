<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Recepie;

use Laravel\Scout\Searchable;

class Ingredient extends Model
{
    use Searchable;

    public $asYouType = true;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'recepie_id',
        'name',
        'owner_id'
    ];

    public function recepie() {
        return $this->belongsTo(Recepie::class);
    }

}
