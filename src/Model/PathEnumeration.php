<?php

namespace Ucf\Hierarchy\Model;

/**
 * Class PathEnumeration
 * @package Ucf\Hierarchy\Model
 */
class PathEnumeration extends AbstractHierarchy
{
    const GENEALOGY = 'genealogy';
    const SORT_ID = 'sort_id';

    /**
     * {@inheritDoc}
     */
    public function validate(array $item)
    {
        foreach ([self::ID, self::GENEALOGY, self::SORT_ID] as $field) {
            if (!array_key_exists($field, $item)) {
                return false;
            }
        }

        return true;
    }
}
