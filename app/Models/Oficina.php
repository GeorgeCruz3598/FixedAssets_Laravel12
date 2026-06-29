<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Oficina
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property Activo[] $activos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Oficina extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activos()
    {
        return $this->hasMany(\App\Models\Activo::class, 'id', 'oficinas_id');
    }
    
}
