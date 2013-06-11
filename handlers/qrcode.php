<?php

if (! isset ($data['data'])) {
	echo "<!-- GChart Error: Missing 'data' parameter -->\n";
	return false;
}

if (! is_string ($data['data'])) {
	$data['data'] = json_encode ($data['data']);
}

$data['width'] = isset ($data['width']) ? $data['width'] : 100;
$data['height'] = isset ($data['height']) ? $data['height'] : 100;
$data['color'] = isset ($data['color']) ? $data['color'] : '000';
$data['bgcolor'] = isset ($data['bgcolor']) ? $data['bgcolor'] : null;
$data['id'] = md5 ($data['data']);

$page->add_script ('/apps/gchart/js/jquery.qrcode-0.3.min.js');

echo $tpl->render ('gchart/qrcode', $data);

?>