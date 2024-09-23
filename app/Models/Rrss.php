<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Rrss
 * 
 * @property int $id
 * @property string $red
 *
 * @package App\Models
 */
class Rrss extends Model
{
	protected $table = 'rrss';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'red'
	];
}
