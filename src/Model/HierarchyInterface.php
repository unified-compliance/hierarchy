<?php

namespace Ucf\Hierarchy\Model;

/**
 * Interface HierarchyInterface
 * @package Ucf\Hierarchy\Model
 */
interface HierarchyInterface
{
    /**
     * Set the hierarchy data
     *
     * @param array $data
     *
     * @return void
     */
    public function setData(array $data);

    /**
     * Get a single item by ID
     *
     * @param $id
     *
     * @return array
     */
    public function getItem($id);

    /**
     * Get all data
     *
     * @return array
     */
    public function toArray();

    /**
     * Check if an item is valid
     *
     * @param array $item
     *
     * @return bool
     */
    public function validate(array $item);
}
