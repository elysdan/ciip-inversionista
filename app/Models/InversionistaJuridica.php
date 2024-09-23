<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class InversionistaJuridica
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
 * @property string $rif
 * @property string $telefono
 * @property string|null $rrss
 * @property string $razon_social
 * @property string $numero_identificacion
 * @property string $desc_suxinta
 * @property string $direccion_fiscal
 * @property string $telefonoempresa
 * @property string $emailempresa
 * @property string $webempresa
 * @property string $email
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 * @property Collection|DatosPoder[] $datos_poders
 * @property Collection|DatosInversion[] $datos_inversions
 * @property Collection|DatosRegistro[] $datos_registros
 * @property Collection|DatosRepresentante[] $datos_representantes
 *
 * @package App\Models
 */
class InversionistaJuridica extends Model
{
	protected $table = 'inversionista_juridicas';

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
		'rif',
		'telefono',
		'rrss',
		'razon_social',
		'numero_identificacion',
		'desc_suxinta',
		'direccion_fiscal',
		'telefonoempresa',
		'emailempresa',
		'webempresa',
		'email'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function datos_poders()
	{
		return $this->hasMany(DatosPoder::class, 'inversionista_juridicas_id');
	}

	public function datos_inversions()
	{
		return $this->hasMany(DatosInversion::class, 'inversionista_juridicas_id');
	}

	public function datos_registros()
	{
		return $this->hasMany(DatosRegistro::class, 'inversionista_juridicas_id');
	}

	public function datos_representantes()
	{
		return $this->hasMany(DatosRepresentante::class, 'inversionista_juridicas_id');
	}
}
