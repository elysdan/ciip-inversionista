<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DatosPoder
 * 
 * @property int $id
 * @property int $user_id
 * @property int $inversionista_juridicas_id
 * @property string $libro
 * @property string $numero
 * @property Carbon $fecha
 * @property string $notaria
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 * @property InversionistaJuridica $inversionista_juridica
 *
 * @package App\Models
 */
class DatosPoder extends Model
{
	protected $table = 'datos_poders';

	protected $casts = [
		'user_id' => 'int',
		'inversionista_juridicas_id' => 'int',
		'fecha' => 'datetime'
	];

	protected $fillable = [
		'user_id',
		'inversionista_juridicas_id',
		'libro',
		'numero',
		'fecha',
		'notaria'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function inversionista_juridica()
	{
		return $this->belongsTo(InversionistaJuridica::class, 'inversionista_juridicas_id');
	}
}
