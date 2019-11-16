<?php 


class Weather implements WeatherProvider{

    private $provider_name;

    public function __construct($provider_name) {
        $this->provider_name = $provider_name;
    }
    public function getProviderName(): string {
        return $this->provider_name;
    }

    public function getCurrentWeather(string $location): WeatherDetails {
        $WeatherDetails = new WeatherDetails($location);

        return $WeatherDetails;
    }

}

?>
