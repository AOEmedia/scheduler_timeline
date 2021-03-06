<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011 Fabrizio Branca <typo3@fabrizio-branca.de>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
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

/**
 * GanttViewHelper
 *
 * @author	Fabrizio Branca <typo3@fabrizio-branca.de>
 * @package TYPO3
 * @subpackage tx_schedulertimeline
 */
class Tx_SchedulerTimeline_ViewHelpers_Format_SpeakingDateViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

	/**
	 * Render
	 *
	 * @param string $timestamp
	 * @param string $defaultFormat
	 * @param string $today
	 * @param string $tomorrow
	 * @param string $yesterday
	 * @return string
	 */
	public function render($timestamp, $defaultFormat='Y.m.d H:i', $todayFormat='H:i', $tomorrowFormat='\T\o\m\m\o\r\o\w, H:i', $yesterdayFormat='\Y\e\s\t\e\r\d\a\y, H:i') {
		$day = date('Ymd', $timestamp);
		if ($todayFormat && (date('Ymd') == $day)) {
			$result = date($todayFormat, $timestamp);
		} elseif ($tomorrowFormat && (date('Ymd', strtotime('+1 day')) == $day)) {
			$result = date($tomorrowFormat, $timestamp);
		} elseif ($yesterdayFormat && (date('Ymd', strtotime('-1 day')) == $day)) {
			$result = date($yesterdayFormat, $timestamp);
		} else {
			$result = date($defaultFormat, $timestamp);
		}
		return $result;
	}

}

