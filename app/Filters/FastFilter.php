<?php

namespace App\Filters;
class FastFilter extends QueryFilter {

    public function search_input($search_string = '') {
        return $this->builder
            ->where('title', 'LIKE' , '%' . $search_string . '%')
            ->orWhere('description', 'LIKE' , '%' . $search_string . '%')
            ->orWhere('content', 'LIKE' , '%' . $search_string . '%');
    }

}