<?php

return [
    ['id' => 0, 'parent_id' => null, 'sort_value' => 0, 'genealogy' => '0000000', 'sort_id' => '000'],
    ['id' => 1, 'parent_id' => 0, 'sort_value' => 1, 'genealogy' => '0000000', 'sort_id' => '000 001'],
    ['id' => 2, 'parent_id' => 1, 'sort_value' => 1, 'genealogy' => '0000000 0000001', 'sort_id' => '000 001 001'],
    ['id' => 3, 'parent_id' => 1, 'sort_value' => 2, 'genealogy' => '0000000 0000001', 'sort_id' => '000 001 002'],
    ['id' => 4, 'parent_id' => 2, 'sort_value' => 3, 'genealogy' => '0000000 0000001 0000002', 'sort_id' => '000 001 001 003'],
    ['id' => 5, 'parent_id' => 2, 'sort_value' => 2, 'genealogy' => '0000000 0000001 0000002', 'sort_id' => '000 001 001 002'],
    ['id' => 6, 'parent_id' => 5, 'sort_value' => 1, 'genealogy' => '0000000 0000001 0000002 0000005', 'sort_id' => '000 001 001 002 001'],
    ['id' => 7, 'parent_id' => 5, 'sort_value' => 2, 'genealogy' => '0000000 0000001 0000002 0000005', 'sort_id' => '000 001 001 002 002'],
    ['id' => 8, 'parent_id' => 5, 'sort_value' => 3, 'genealogy' => '0000000 0000001 0000002 0000005', 'sort_id' => '000 001 001 002 003'],
    ['id' => 9, 'parent_id' => 7, 'sort_value' => 1, 'genealogy' => '0000000 0000001 0000002 0000005 0000007', 'sort_id' => '000 001 001 002 002 001'],
    ['id' => 10, 'parent_id' => 7, 'sort_value' => 2, 'genealogy' => '0000000 0000001 0000002 0000005 0000007', 'sort_id' => '000 001 001 002 002 002'],
];
