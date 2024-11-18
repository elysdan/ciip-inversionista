<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $file
 * @property string|null $surname
 * @property float|null $role
 * @property float|null $status
 * 
 * @property Collection|InversionistaJuridica[] $inversionista_juridicas
 * @property Collection|InversionistaNatural[] $inversionista_naturals
 * @property Collection|DatosPoder[] $datos_poders
 * @property Collection|DatosInversion[] $datos_inversions
 * @property Collection|DatosRegistro[] $datos_registros
 * @property Collection|DatosRepresentante[] $datos_representantes
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';

	protected $casts = [
		'email_verified_at' => 'datetime',
		'role' => 'float',
		'status' => 'float',
		'password' => 'hashed'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'email_verified_at',
		'password',
		'remember_token',
		'file',
		'surname',
		'role',
		'status'
	];

	
}
