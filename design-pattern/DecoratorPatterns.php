<?php

interface CarService {
    public function getCost(); 
    public function getDescription();
}

class BasicInspection implements CarService {
    public function getCost() {
        return 20; 
    }

    public function getDescription() {
        return 'Basic Inspection'; 
    }
}

class OilChange  implements CarService {
    private $carService;
    public function __construct(CarService $carService) {
        $this->carService = $carService; 
    }
    public function getCost() {
        return 15 + $this->carService->getCost(); 
    }
    public function getDescription() {
        return $this->carService->getDescription() . ' and Oil Change'; 
    }
}

class TireRotation implements CarService {
    private $carService;
    public function __construct(CarService $carService) {
        $this->carService = $carService; 
    }
    public function getCost() {
        return 150 + $this->carService->getCost(); 
    }
    public function getDescription() {
        return  $this->carService->getDescription() . ' and Tire Rotation'; 
    }
}


echo  (new TireRotation(new OilChange(new BasicInspection)))->getDescription();


