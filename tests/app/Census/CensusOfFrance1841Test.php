<?php

/**
 * webtrees: online genealogy
 * Copyright (C) 2016 webtrees development team
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
namespace Fisharebest\Webtrees\Census;

/**
 * Test harness for the class CensusOfFrance1841
 */
class CensusOfFrance1841Test extends \PHPUnit_Framework_TestCase {
	/**
	 * Test the census place and date
	 *
	 * @covers Fisharebest\Webtrees\Census\CensusOfFrance1841
	 */
	public function testPlaceAndDate() {
		$census = new CensusOfFrance1841;

		$this->assertSame('France', $census->censusPlace());
		$this->assertSame('21 JAN 1841', $census->censusDate());
	}

	/**
	 * Test the census columns
	 *
	 * @covers Fisharebest\Webtrees\Census\CensusOfFrance1841
	 * @covers Fisharebest\Webtrees\Census\AbstractCensusColumn
	 */
	public function testColumns() {
		$census  = new CensusOfFrance1841;
		$columns = $census->columns();

		$this->assertCount(4, $columns);
		$this->assertInstanceOf('Fisharebest\Webtrees\Census\CensusColumnSurname', $columns[0]);
		$this->assertInstanceOf('Fisharebest\Webtrees\Census\CensusColumnGivenNames', $columns[1]);
		$this->assertInstanceOf('Fisharebest\Webtrees\Census\CensusColumnOccupation', $columns[2]);
		$this->assertInstanceOf('Fisharebest\Webtrees\Census\CensusColumnConditionFrench', $columns[3]);

		$this->assertSame('Nom', $columns[0]->abbreviation());
		$this->assertSame('Prénom', $columns[1]->abbreviation());
		$this->assertSame('Profession', $columns[2]->abbreviation());
		$this->assertSame('Situtation pers.', $columns[3]->abbreviation());

		$this->assertSame('Nom de famille', $columns[0]->title());
		$this->assertSame('Prénom', $columns[1]->title());
		$this->assertSame('Profession', $columns[2]->title());
		$this->assertSame('Situation personnelle (marié, veuf…)', $columns[3]->title());
	}
}
