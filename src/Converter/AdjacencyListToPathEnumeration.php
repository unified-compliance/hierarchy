<?php

namespace Ucf\Hierarchy\Converter;

use Ucf\Hierarchy\Model\AdjacencyList;
use Ucf\Hierarchy\Model\PathEnumeration;

/**
 * Class AdjacencyListToPathEnumeration
 * @package Ucf\Hierarchy\Converter\AdjacencyListToPathEnumeration
 */
class AdjacencyListToPathEnumeration
{
    const DEFAULT_ID_PADDING = 7;
    const DEFAULT_SORT_PADDING = 3;
    const DEFAULT_DELIMITER = ' ';

    /**
     * @var int
     */
    protected $idPadding;

    /**
     * @var int
     */
    protected $sortPadding;

    /**
     * @var string
     */
    protected $delimiter;

    /**
     * @param int $idPadding the width of zero-padded IDs
     * @param int $sortPadding the width of zero-padded sort values
     * @param string $delimiter the separator between values
     */
    public function __construct(
        $idPadding = self::DEFAULT_ID_PADDING,
        $sortPadding = self::DEFAULT_SORT_PADDING,
        $delimiter = self::DEFAULT_DELIMITER
    ) {
        $this->idPadding = $idPadding;
        $this->sortPadding = $sortPadding;
        $this->delimiter = $delimiter;
    }

    /**
     * Convert an AdjacencyList model to PathEnumeration
     *
     * @param AdjacencyList $adjacencyList
     *
     * @return PathEnumeration
     */
    public function convert(AdjacencyList $adjacencyList)
    {
        $convertedData = [];

        foreach ($adjacencyList->toArray() as $item) {
            $convertedData[] = $this->buildItem($item, $adjacencyList);
        }

        return new PathEnumeration($convertedData);
    }

    /**
     * Build genealogy and sort ID for a single item
     *
     * @param array $item the current item to convert
     * @param AdjacencyList $adjacencyList the source adjacency list
     *
     * @return array
     */
    protected function buildItem(array $item, AdjacencyList $adjacencyList)
    {
        $convertedItem = $item;

        $ancestors = [];
        $sortValues[] = $this->padSort($item[AdjacencyList::SORT_VALUE]);

        // walk up the tree, stop at root (null parent ID)
        while (null !== $item[AdjacencyList::PARENT_ID]) {
            $item = $adjacencyList->getItem($item[AdjacencyList::PARENT_ID]);

            $ancestors[] = $this->padId($item[AdjacencyList::ID]);
            $sortValues[] = $this->padSort($item[AdjacencyList::SORT_VALUE]);
        }

        // we now reverse the array order because we walked backwards up the tree
        $convertedItem[PathEnumeration::SORT_ID] = implode(
            $this->delimiter,
            array_reverse($sortValues)
        );

        $convertedItem[PathEnumeration::GENEALOGY] = implode(
            $this->delimiter,
            array_reverse($ancestors)
        );

        if (empty($ancestors)) {
            // special case for root item - its genealogy includes its own ID
            $convertedItem[PathEnumeration::GENEALOGY] = $this->padId($convertedItem[PathEnumeration::ID]);
        }

        return $convertedItem;
    }

    /**
     * Pad an ID value to the configured width
     *
     * @param $id
     * @return string
     */
    protected function padId($id)
    {
        return str_pad($id, $this->idPadding, '0', STR_PAD_LEFT);
    }

    /**
     * Pad a sort value to the configured width
     *
     * @param $sort
     * @return string
     */
    protected function padSort($sort)
    {
        return str_pad($sort, $this->sortPadding, '0', STR_PAD_LEFT);
    }
}
