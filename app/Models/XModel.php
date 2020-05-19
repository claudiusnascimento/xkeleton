<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class XModel extends Model
{
    public function scopeBoolForHumans($query, $col = 'active', $strTrue = 'Activo', $strFalse = 'Inativo') {
        return $query->{$col} ? $strTrue : $strFalse;
    }

    public function scopeMatch($query, $col, $pattern) {

        return $query->where($col, 'REGEXP', $pattern);
    }

    public function scopeNotMatch($query, $col, $pattern) {

        return $query->where($col, 'NOT REGEXP', $pattern);
    }
}
