<?php
declare(strict_types=1);

namespace App\Service;

use App\Entity\Location;
use App\Entity\Forecast;
use App\Repository\ForecastRepository;
use App\Repository\LocationRepository;

class WeatherUtil
{
    private LocationRepository $locationRepo;
    private ForecastRepository $measurementRepo;

    public function __construct(LocationRepository $location, ForecastRepository $measurement) {
        $this->locationRepo = $location;
        $this->measurementRepo = $measurement;
    }
    /**
     * @param Location $location
     * @return Forecast[]
     */
    public function getWeatherForLocation(Location $location): array
    {
        return $this->measurementRepo->findByLocation($location);
    }

    /**
     * @param string $city
     * @param string|null $countryCode
     * @return array|null
     */
    public function getWeatherForCountryAndCity( string $city, ?string $countryCode): ?array
    {
        $location = $this->locationRepo->findOneByCity($city, $countryCode);
        if(!$location) {
            return null;
        }
        $measurements = $this->measurementRepo->findByLocation($location);
        return ['measurements' => $measurements, 'location' => $location];
    }
}
