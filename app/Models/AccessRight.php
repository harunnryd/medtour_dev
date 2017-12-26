<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessRight extends Model
{
    protected $fillable = ['create', 'read', 'update', 'delete'];
    protected $guarded  = ['id'];
    protected $casts    = [
        'create'       => 'boolean',
        'read'         => 'boolean',
        'update'       => 'boolean',
        'delete'       => 'boolean',
    ];

    protected static function boot() {
        parent::boot();
        static::observe(app('accessright-observer'));
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }
}
