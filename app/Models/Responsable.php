<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Responsable
 *
 * @property $id
 * @property $ci
 * @property $nombre
 * @property $foto
 * @property $created_at
 * @property $updated_at
 *
 * @property Activo[] $activos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Responsable extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['ci', 'nombre', 'foto'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activos()
    {
        return $this->hasMany(\App\Models\Activo::class, 'id', 'responsables_id');
    }
    
}
