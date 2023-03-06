<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

trait Filterable
{
    /**
     * Filter the model using request filters.
     *
     * Filters should be sent as array in filters[] parameter.
     *
     * @example
     *         filters[]="name like jack"
     *         filters[]=name like ja%
     *         filters[]="age < 50"
     *         filters[]=relationship = Single
     *         filters[]="country != France",
     *
     * @param Builder $query
     * @param Request $request
     * @return Builder
     */
    public static function scopeFilter(Builder $query, Request $request): Builder
    {
        $filters    = $request->get('filters') ?? [];
        $conditions = self::parseFilters($filters);

        foreach ($conditions as $condition)
        {
            if (in_array($condition['column'], self::$filterables))
            {
                $query->where($condition['column'], $condition['operator'], $condition['value']);
            }
        }

        return $query;
    }

    /**
     * Parse request filters parameters into conditions.
     *
     * Use regular expression to parse the filter string into: [column, operator, value]
     *
     * @example
     *         filters[
     *             "name like a%"
     *             "age <= 25"
     *             "relation=Engaged"
     *         ]
     *
     * @param array $filters
     * @return array
     */
    private static function parseFilters(array $filters): array
    {
        $conditions = [];

        foreach ($filters as $filter)
        {
            $result = preg_match('@^(?P<column>.*?)(?P<operator>like|=|<|<=|>|>=|!=|<>)(?P<value>.*?)$@ius', $filter, $matches);
            if($result && count($matches) > 0)
            {
                $conditions[] = [
                    'column'   => trim($matches['column']),
                    'operator' => trim($matches['operator']),
                    'value'    => trim($matches['value']),
                ];
            }
        }

        return $conditions;
    }
}