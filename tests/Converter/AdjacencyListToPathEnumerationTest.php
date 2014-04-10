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

        $adjacencyList = new AdjacencyList($data);

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
