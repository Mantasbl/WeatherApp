<?php 

class WeatherDetails {

    public $location;

    public function __construct($location) {
        $this->location = $location;
    }

    public function OpenWeatherMapProvider() {
        $apiKey = "2c9375bc819c5b73effd9ea7a64392c1";
        $googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?q=" . $this->location . ",uk&lang=en&units=metric&APPID=" . $apiKey;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);

        curl_close($ch);
        $firstData = json_decode($response);
        return $firstData;
    }

    public function WeatherBitProvider() {
        $apiKey = "e5c49d96d40147cfb764d0596676d637";
        $googleApiUrl = "https://api.weatherbit.io/v2.0/current?city=" . $this->location . ",UK&key=" . $apiKey;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);

        curl_close($ch);
        $firstData = json_decode($response);
        return $firstData;
    }
}

?>