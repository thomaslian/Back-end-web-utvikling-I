<?php
include 'Circle.php';
include 'Rectangle.php';

// Calculate circle area
$circle = new Circle();
$circle->setRadius(10);
$circle->calculateArea();
$area = $circle->getArea();
$classType = get_class($circle);
print "This object is a $classType and har an area of $area <br>";

// Calculate rectangle area
$rectangle = new Rectangle();
$rectangle->setWidth(5);
$rectangle->setLength(2);
$rectangle->calculateArea();
$area = $rectangle->getArea();
$classType = get_class($rectangle);
print "This object is a $classType and har an area of $area <br>";

// Calculate rectangle area
$rectangle = new Rectangle();
$rectangle->setWidth(2);
$rectangle->setLength(2);
$rectangle->calculateArea();
$area = $rectangle->getArea();
$classType = get_class($rectangle);
print "This object is a $classType and har an area of $area <br>";

// Print number of circles and rectangles
$numCirc = Shape::$num_circ;
$numRect = Shape::$num_rect;
print "We now have $numCirc circles and $numRect rectangles!<br>";






?>