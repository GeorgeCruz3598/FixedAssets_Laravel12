<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Activo
 *
 * @property $id
 * @property $codigo
 * @property $descrip
 * @property $precio
 * @property $fadquisicion
 * @property $foto
 * @property $estados_id
 * @property $grupos_id
 * @property $oficinas_id
 * @property $responsables_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Estado $estado
 * @property Grupo $grupo
 * @property Oficina $oficina
 * @property Responsable $responsable
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Activo extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['codigo', 'descrip', 'precio', 'fadquisicion', 'foto', 'estados_id', 'grupos_id', 'oficinas_id', 'responsables_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estado()
    {
        return $this->belongsTo(\App\Models\Estado::class, 'estados_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function grupo()
    {
        return $this->belongsTo(\App\Models\Grupo::class, 'grupos_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function oficina()
    {
        return $this->belongsTo(\App\Models\Oficina::class, 'oficinas_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function responsable()
    {
        return $this->belongsTo(\App\Models\Responsable::class, 'responsables_id', 'id');
    }
    
}
