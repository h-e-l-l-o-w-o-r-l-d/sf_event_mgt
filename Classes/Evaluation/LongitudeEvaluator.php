<?php
namespace DERHANSEN\SfEventMgt\Evaluation;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Torben Hansen <derhansen@gmail.com>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
use TYPO3\CMS\Core\Utility\MathUtility;

/**
 * LongitudeEvaluator
 */
class LongitudeEvaluator {

	/**
	 * Validates the given longitude value (between -180 and 180 degrees)
	 * @see https://developers.google.com/maps/documentation/javascript/reference?hl=fr#LatLng
	 *
	 * @param mixed $value The value that has to be checked.
	 * @param string $is_in Is-In String
	 * @param int $set Determines if the field can be set (value correct) or not
	 *
	 * @return string The new value of the field
	 */
	public function evaluateFieldValue($value, $is_in, &$set) {
		$newValue = '0.000000';
		$set = TRUE;
		if (MathUtility::canBeInterpretedAsFloat($value) &&
			((float)$value >= -180 && (float)$value <= 180)) {
			$newValue = number_format((float)$value, 6);
		}
		return $newValue;
	}
}