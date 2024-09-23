<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class InversionistaNatural
 * 
 * @property int $id
 * @property int $user_id
 * @property string $nombre
 * @property string $apellido
 * @property string $doc_identidad
 * @property string $nacionalidad
 * @property Carbon $fecha_nacimiento
 * @property int $edad
 * @property string $estado_civil
 * @property string $sexo
 * @property string $direccion
 * @property string $telefono
 * @property string $email
 * @property string|null $rrss
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class InversionistaNatural extends Model
{
	protected $table = 'inversionista_naturals';

	protected $casts = [
		'user_id' => 'int',
		'fecha_nacimiento' => 'datetime',
		'edad' => 'int'
	];

	protected $fillable = [
		'user_id',
		'nombre',
		'apellido',
		'doc_identidad',
		'nacionalidad',
		'fecha_nacimiento',
		'edad',
		'estado_civil',
		'sexo',
		'direccion',
		'telefono',
		'email',
		'rrss'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
