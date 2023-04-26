<?php

namespace App\Filters;
class ReceptFilter extends QueryFilter {
    public function category_id($params = null) {
        return $this->builder->when($params, function ($query) use($params) {
            $query->where('category_id', $params);
        });
    }

    public function search_input($search_string = '') {
        return $this->builder
            ->where('title', 'LIKE' , '%' . $search_string . '%')
            ->orWhere('description', 'LIKE' , '%' . $search_string . '%')
            ->orWhere('content', 'LIKE' , '%' . $search_string . '%');
    }

}
