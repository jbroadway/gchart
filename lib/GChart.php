<?php

/**
 * Helper class.
 */
class GChart {
	/**
	 * Parses a CSV-formatted string into labels and data.
	 */
	public static function from_csv ($csv) {
		$data = explode ("\n", $csv);
		$first = array_shift ($data);
		$labels = preg_split ('/, ?/', $first);

		foreach ($data as $key => $row) {
			$row = preg_split ('/, ?/', $row);
			foreach ($row as $col => $val) {
				$val = trim ($val);
				if (is_numeric ($val)) {
					$row[$col] = $val + 0;
				}
			}
			$data[$key] = $row;
		}

		return array ($labels, $data);
	}

	/**
	 * Takes the first row of data and returns labels
	 * ready for sending to the view template.
	 *
	 * Usage:
	 *
	 *     $data['labels'] = GChart::get_labels (array_shift ($data['data']));
	 */
	public static function get_labels ($label_row) {
		$labels = array ();

		foreach ($label_row as $k => $v) {
			$v = trim ($v);

			if (strpos ($v, ':') !== false) {
				list ($type, $label) = explode (':', $v);
			} elseif ($k === 0) {
				$type = 'string';
				$label = $v;
			} else {
				$type = 'number';
				$label = $v;
			}

			$labels[$k] = (object) array (
				'type' => $type,
				'label' => $label
			);
		}

		return $labels;
	}
}

?>