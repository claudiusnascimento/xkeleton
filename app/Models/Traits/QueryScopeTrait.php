<?php

namespace App\Models\Traits;


trait QueryScopeTrait
{
	/**
	 *  Local Scopes
	 */
    public function scopeOrdered($query, $col = 'order', $direction = 'asc') {
        return $query->orderBy($col, $direction);
    }

    public function scopeActivated($query, $bool = true, $col = 'active') {
        return $query->where('active', $bool);
    }

    /**
     *  Functions Helpers
     */
    public function boolForHumans($col = 'active') {
    	return $this->active ? 'Sim' : 'Não';
    }

    public function creationDate($col = 'created_at', $format = 'd/m/Y H:i:s') {
    	return $this->created_at->format($format);
    }
}
