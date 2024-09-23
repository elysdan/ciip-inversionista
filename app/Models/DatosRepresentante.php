<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DatosRepresentante
 * 
 * @property int $id
 * @property int $user_id
 * @property int $inversionista_juridicas_id
 * @property string $nombre
 * @property string $apellido
 * @property string $doc_identidad
 * @property string $telefono
 * @property string $email
 * @property string|null $rrss
 * @property string $tipo_representante
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 * @property InversionistaJuridica $inversionista_juridica
 *
 * @package App\Models
 */
class DatosRepresentante extends Model
{
	protected $table = 'datos_representantes';

	protected $casts = [
		'user_id' => 'int',
		'inversionista_juridicas_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'inversionista_juridicas_id',
		'nombre',
		'apellido',
		'doc_identidad',
		'telefono',
		'email',
		'rrss',
		'tipo_representante'
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
