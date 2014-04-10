<?php

namespace Ucf\Hierarchy\Model;

/**
 * Class AdjacencyList
 * @package Ucf\Hierarchy\Model\AdjacencyList
 */
class AdjacencyList extends AbstractHierarchy
{
    const PARENT_ID = 'parent_id';
    const SORT_VALUE = 'sort_value';

    /**
     * {@inheritDoc}
     */
    public function validate(array $item)
    {
        foreach ([self::ID, self::PARENT_ID, self::SORT_VALUE] as $field) {
            if (!array_key_exists($field, $item)) {
                return false;
            }
        }

        return true;
    }
}
