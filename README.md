UCF Hierarchy Data Converter
============================

This small library demonstrates how one might go about converting adjacency list data (UCF parent ID and sort value fields) to path enumeration data (UCF genealogy and sort ID)

Tests
-----

The repository's composer.json specifies PHPUnit as a dev dependency, so running the tests is just a matter of cloning the repo, then (assuming composer installed and in PATH)

	composer update
	vendor/bin/phpunit