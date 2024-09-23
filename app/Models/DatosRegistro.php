<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DatosRegistro
 * 
 * @property int $id
 * @property int $user_id
 * @property int $inversionista_juridicas_id
 * @property string $oficina
 * @property Carbon $fecha
 * @property string $numero
 * @property string $tomo
 * @property string $expediente
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 * @property InversionistaJuridica $inversionista_juridica
 *
 * @package App\Models
 */
class DatosRegistro extends Model
{
	protected $table = 'datos_registros';

	protected $casts = [
		'user_id' => 'int',
		'inversionista_juridicas_id' => 'int',
		'fecha' => 'datetime'
	];

	protected $fillable = [
		'user_id',
		'inversionista_juridicas_id',
		'oficina',
		'fecha',
		'numero',
		'tomo',
		'expediente'
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
