<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Estado
 *
 * @property $id
 * @property $descrip
 * @property $created_at
 * @property $updated_at
 *
 * @property Activo[] $activos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Estado extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['descrip'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activos()
    {
        return $this->hasMany(\App\Models\Activo::class, 'id', 'estados_id');
    }
    
}
