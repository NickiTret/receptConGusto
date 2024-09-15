<?php

namespace App\Filters;

class ReceptFilter extends QueryFilter
{
    public function category_id($params = null)
    {
        return $this->builder->when(!is_null($params), function ($query) use ($params) {
            $query->where('category_id', $params);
        });
    }

    public function search_input(string $search_string = '')
    {
        return $this->builder->when(!empty($search_string), function ($query) use ($search_string) {
            $query->where(function ($query) use ($search_string) {
                $query->where('title', 'LIKE', '%' . $search_string . '%')
                    ->orWhere('description', 'LIKE', '%' . $search_string . '%')
                    ->orWhere('content', 'LIKE', '%' . $search_string . '%');
            });
        });
    }
}
