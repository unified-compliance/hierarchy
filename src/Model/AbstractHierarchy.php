<?php

namespace Ucf\Hierarchy\Model;

use InvalidArgumentException;

/**
 * Class AbstractHierarchy
 * @package Ucf\Hierarchy\Model
 */
abstract class AbstractHierarchy implements HierarchyInterface
{
    const ID = 'id';

    /**
     * @var array
     */
    protected $data;

    /**
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->setData($data);
    }

    /**
     * {@inheritDoc}
     */
    public function setData(array $data)
    {
        $this->data = $this->indexData($data);
    }

    /**
     * {@inheritDoc}
     */
    public function toArray()
    {
        return $this->data;
    }

    /**
     * {@inheritDoc}
     */
    public function getItem($id)
    {
        $this->checkExists($id);

        return $this->data[$id];
    }

    /**
     * Ensure that an item is present in the data array
     *
     * @param $id
     *
     * @throws InvalidArgumentException
     */
    protected function checkExists($id)
    {
        if (!isset($this->data[$id])) {
            throw new InvalidArgumentException(sprintf(
                'Item with id %s does not exist',
                $id
            ));
        }
    }

    /**
     * Index data by ID
     *
     * @param array $data
     *
     * @throws InvalidArgumentException
     *
     * @return array
     */
    protected function indexData(array $data)
    {
        $indexedData = [];

        foreach ($data as $item) {
            if (!$this->validate($item)) {
                throw new InvalidArgumentException(sprintf(
                    'Invalid item given: %s',
                    print_r($item, true)
                ));
            }

            $indexedData[$item[self::ID]] = $item;
        }

        return $indexedData;
    }
}
