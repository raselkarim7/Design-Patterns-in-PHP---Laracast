<?php

/**
 * Decorator pattern allows to add new functionality to an object without changing it's structure.
 * Decorator pattern Example 1:
 * Here I added red boder to a Circle or Rectangle Object by wrapping the desired object
 * by RedShapeDecorator
 */
interface Shape {
    public function draw();
}

class Circle implements Shape {
    public function draw() {
        echo 'this is circle';
    }
}

class Rectangle implements Shape {
    public function draw() {
        echo 'this is rectangle';
    }
}


class RedShapeDecorator implements Shape {
    private $shape;

    public function __construct(Shape $shape)
    {
        $this->shape = $shape;
    }

    public function draw() {
        $this->shape->draw();
        $this->setRedBorder();
    }

    public function setRedBorder() {
        echo ', Border Color: Red'."\n";
    }
}

$circle = new RedShapeDecorator(new Circle());
$circle->draw();

$rectangle = new RedShapeDecorator(new Rectangle());
$rectangle->draw();