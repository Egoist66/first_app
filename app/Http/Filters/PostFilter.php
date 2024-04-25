<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const CONTENT = 'content';
    public const CATEGORY_ID = 'category_id';


    final protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::CONTENT => [$this, 'content'],
            self::CATEGORY_ID => [$this, 'categoryId'],
        ];

    }

    final public function title(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%{$value}%");
    }

    final public function content(Builder $builder, $value)
    {
        $builder->where('content', 'like', "%{$value}%");
    }

    final public function categoryId(Builder $builder, $value)
    {
        $builder->where('category_id', $value);
    }
}
