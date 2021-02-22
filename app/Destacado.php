<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $titulo
 * @property string $parrafo
 * @property string $color_titulo
 * @property string $color_background
 * @property string $color_button
 * @property string $color_button_text
 * @property string $color_parrafo
 * @property string $color_hash
 * @property string $path_logo
 * @property string $path_display
 * @property string $created_at
 * @property string $updated_at
 * @property string $color_logo
 * @property DestacadoHash[] $destacadoHashes
 */
class Destacado extends Model
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
    protected $fillable = ['titulo', 'parrafo', 'color_titulo', 'color_background', 'color_button', 'color_button_text', 'color_parrafo', 'color_hash', 'path_logo', 'path_display', 'created_at', 'updated_at', 'color_logo'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function destacadoHashes()
    {
        return $this->hasMany('App\DestacadoHash');
    }
}
