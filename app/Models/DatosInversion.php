<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DatosInversion
 * 
 * @property int $id
 * @property int $user_id
 * @property int $inversionista_juridicas_id
 * @property string $sectors_id
 * @property string $intencion
 * @property string $activo_susceptible_inversion
 * @property string $ubicacion
 * @property string $tipo_intencion
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 * @property InversionistaJuridica $inversionista_juridica
 *
 * @package App\Models
 */
class DatosInversion extends Model
{
	protected $table = 'datos_inversions';

	protected $casts = [
		'user_id' => 'int',
		'inversionista_juridicas_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'inversionista_juridicas_id',
		'sectors_id',
		'intencion',
		'activo_susceptible_inversion',
		'ubicacion',
		'tipo_intencion'
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
