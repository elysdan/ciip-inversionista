<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RedesSocialesDelegado
 * 
 * @property int $id
 * @property int|null $delegate_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $site
 * @property string|null $username
 *
 * @package App\Models
 */
class redessocialesempresa extends Model
{
	protected $table = 'redes_sociales_empresas';

	protected $casts = [
		'enterprise_id' => 'int',
		'site' => 'int'
	];

	protected $fillable = [
		'enterprise_id',
		'site',
		'username'
	];
}
