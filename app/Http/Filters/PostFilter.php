<?php

namespace App\Http\Filters;

use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;


class PostFilter extends AbstractFilter
{
    public const  TITLE = 'title';

    public const CONTENT = 'content';

    public const CATEGORY_ID = 'category_id';
    public function appply(Builder $builder)   {
        
    }

    protected function getCallbacks(): array {
        return [
            self::TITLE => [$this, 'title'],
            self::CONTENT => [$this, 'content'],
            self::CATEGORY_ID => [$this, 'categoryId'],
        ];

    }

    public function title(Builder $builder, $value) {

        if ($value != null) {
            $builder->where('title', 'like', "%{$value}%");
        }
    }

    public function content(Builder $builder, $value) {

        if ($value != null) {
            $builder->where('content', 'like', "%{$value}%");
        }
    }

    public function categoryId(Builder $builder, $value) {

        if ($value != null) {
            $builder->where('category_id', 'like', "%{$value}%");
        }
    }
}