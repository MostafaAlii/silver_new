<?php
namespace App\Services\Dashboard\General;
use App\Models\{Country, CategoryCar};
class GeneralService {
    public function getCountries() {
        return Country::active();
    }

    public function getCategoryCar() {
        return CategoryCar::active();
    }
}