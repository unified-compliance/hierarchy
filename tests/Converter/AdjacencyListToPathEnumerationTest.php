<?php

namespace Ucf\Hierarchy\Tests\Converter;

use PHPUnit_Framework_TestCase;
use Ucf\Hierarchy\Converter\AdjacencyListToPathEnumeration;
use Ucf\Hierarchy\Model\AdjacencyList;
use Ucf\Hierarchy\Model\PathEnumeration;

/**
 * Class AdjacencyListToPathEnumerationTest
 * @package Ucf\Hierarchy\Tests\Converter
 * @covers \Ucf\Hierarchy\Converter\AdjacencyListToPathEnumeration
 */
class AdjacencyListToPathEnumerationTest extends PHPUnit_Framework_TestCase
{
    public function testConversion()
    {
        $data = require(__DIR__ . '/../fixtures/data.php');

        $filteredData = array_map(function(array $item) {
                return [
                    AdjacencyList::ID => $item[AdjacencyList::ID],
                    AdjacencyList::SORT_VALUE => $item[AdjacencyList::SORT_VALUE],
                    AdjacencyList::PARENT_ID => $item[AdjacencyList::PARENT_ID],
                ];
            },
            $data
        );

        $adjacencyList = new AdjacencyList($filteredData);

        $converter = new AdjacencyListToPathEnumeration();

        $pathEnumeration = $converter->convert($adjacencyList);

        $pathData = $pathEnumeration->toArray();

        foreach ($data as $referenceItem) {
            foreach ($pathData as $item) {
                if ($referenceItem[PathEnumeration::ID] !== $item[PathEnumeration::ID]) {
                    continue;
                }

                $this->assertEquals($referenceItem[PathEnumeration::GENEALOGY], $item[PathEnumeration::GENEALOGY]);
                $this->assertEquals($referenceItem[PathEnumeration::SORT_ID], $item[PathEnumeration::SORT_ID]);
            }
        }
    }
}
