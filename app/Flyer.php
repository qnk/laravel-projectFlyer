<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{
	protected $fillable = [
		'street',
		'city',
		'state',
		'country',
		'zip',
		'price',
		'description'
	];

	public function scopeLocatedAt($query,$zip, $street)
	{
		$street = str_replace('-', ' ', $street);

		return $query->where(compact('zip','street'))->firstOrFail();
	}

	//mutator --> getXXXXAttribute
	public function getPriceAttribute($price)
	{
		return number_format($price,2,',','.') . '€';
	}

    public function photos()
    {
    	return $this->hasMany('App\Photo');
    }
}
