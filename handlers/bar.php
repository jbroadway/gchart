<?php

/**
 * Generate a bar chart.
 */

if (! isset ($data['data'])) {
	echo "<!-- GChart Error: Missing 'data' parameter -->\n";
	return false;
}

if (! is_array ($data['data'])) {
	list ($data['labels'], $data['data']) = GChart::from_csv ($data['data']);
}

$data['count'] = self::$called['gchart/bar'];
$data['width'] = isset ($data['width']) ? $data['width'] : 400;
$data['height'] = isset ($data['height']) ? $data['height'] : 300;
$data['bgcolor'] = isset ($data['bgcolor']) ? $data['bgcolor'] : null;
$data['labels'] = GChart::get_labels (
	isset ($data['labels']) ? $data['labels'] : array_shift ($data['data'])
);

$page->add_script ('https://www.google.com/jsapi');
$page->add_script ('<script>google.load("visualization", "1.0", {packages:["corechart"]});</script>');

echo $tpl->render ('gchart/bar', $data);

?>