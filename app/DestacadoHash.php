<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $destacado_id
 * @property string $hash
 * @property string $created_at
 * @property string $updated_at
 * @property Destacado $destacado
 */
class DestacadoHash extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['destacado_id', 'hash', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function destacado()
    {
        return $this->belongsTo('App\Destacado');
    }
}
