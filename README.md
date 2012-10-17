# gCharts

An [Elefant CMS](http://www.elefantcms.com/) app for easier integration of
[Google Charts](https://developers.google.com/chart/).

### Usage

In the Dynamic Objects menu of the Elefant wysiwyg editor, you'll find
several embeddable chart types there.

For developers, you can render a chart from any handler like this:

```php
<?php

echo $this->run ('gchart/pie', array (
	'title' => 'How Much Pizza I Ate Last Night',
	'width' => 500,
	'height' => 300,
	'labels' => array (
		'string:Topping',
		'number:Slices'
	),
	'data' => array (
		array ('Pepperoni', 3),
		array ('Mushroom', '2),
		array ('Onions', 1),
		array ('Feta', 2),
		array ('Anchovies', 1)
	)
));

?>
```

And in any view template, you can render the same chart like this:

```php
{! gchart/pie
	?title=How Much Pizza I Ate Last Night
	&width=500
	&height=300
	&labels=[labels|none]
	&data=[data|none]
!}
```

This example assumes `View::render()` was passed a data array with keys
`labels` and `data` containing the same structures as in the PHP example
above.

### Types of charts

* `gchart/bar`
* `gchart/column`
* `gchart/pie`

> More to come soon.

### Options

The following options are available to all chart types:

#### `data`

A 2D array of the chart data values, for example:

```php
array (
	array ('Toronto', 537, 482, 399),
	array ('Vancouver', 395, 423, 367),
	array ('Winnipeg', 235, 123, 467)
)
```

> Note: Data can also be passed as CSV data, in which case the labels
> will be taken from the first row.

#### `labels`

An array of labels for the data columns, with optional type hints. If
no type hints are provided, it will assume the first column is a string
and the rest are numbers.

```php
array (
	'string:City',
	'number:2010',
	'number:2011',
	'number:2012'
)
```

> Note: This can also be passed as the first entry in the data array.

#### `width`

The width of the chart graphic.

#### `height`

The height of the chart graphic.

#### `title`

The title of the chart graphic.
