<?php

namespace App\Traits;


trait AppOrdered
{
    protected $orderBy = 'created_at';
    protected $orderDirection = 'desc';

    public function newQuery($ordered = true)
    {
        $query = parent::newQuery();

        if (empty($ordered)) {
            return $query;
        }

        return $query->orderBy($this->orderBy, $this->orderDirection);
    }
}