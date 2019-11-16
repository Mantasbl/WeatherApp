<?php 
    include 'app/WeatherProvider.php';
    include 'app/Weather.php';
    include 'app/WeatherDetails.php';

    //Change Variable below to get results for different cities
    // -------------------------------
    $cityName = 'London';
    // -------------------------------

    $OpenWeatherMap = new Weather('OpenWeatherMap');
    $OpenWeatherMapResult = $OpenWeatherMap->getCurrentWeather($cityName)->OpenWeatherMapProvider();

    $WeatherBit = new Weather('WeatherBit');
    $WeatherBitResult = $WeatherBit->getCurrentWeather($cityName)->WeatherBitProvider();
?>

<!doctype html>
<html>
<head>
<title>Forecast Weather using OpenWeatherMap with PHP</title>
<link rel="stylesheet" href="css/index.css">
</head>
<body>
    <!-- OpenWeatherMap Api results -->
    <div class="report-container">
        <!-- Weather provider name -->
        <h1><?php echo $OpenWeatherMap->getProviderName(); ?></h1>
        <!-- Weather city name -->
        <h2><?php echo $OpenWeatherMapResult->name; ?> Weather Status</h2>
        <div class="time">
            <!-- Weather summary -->
            <div><?php echo ucwords($OpenWeatherMapResult->weather[0]->description); ?></div>
        </div>
        <div class="weather-forecast">
            <img
                src="http://openweathermap.org/img/w/<?php echo $OpenWeatherMapResult->weather[0]->icon; ?>.png"
                class="weather-icon" />
            <!-- Weather temperature max -->
            <?php echo $OpenWeatherMapResult->main->temp_max; ?>&deg;C
            <!-- Weather temperature mix -->
            <span class="min-temperature"><?php echo $OpenWeatherMapResult->main->temp_min; ?>&deg;C</span>
        </div>
    </div>
    <!-- WeatherBit Api results -->
    <div class="report-container">
        <!-- Weather provider name -->
        <h1><?php echo $WeatherBit->getProviderName(); ?></h1>
        <!-- Weather city name -->
        <h2><?php echo $WeatherBitResult->data[0]->city_name; ?> Weather Status</h2>
        <div class="time">
            <!-- Weather summary -->
            <div><?php echo ucwords($WeatherBitResult->data[0]->weather->description); ?></div>
        </div>
        <div class="weather-forecast">
            <!-- Current Weather temperature, as WeatherBit Api current weather request does not contain Mix-Max temperatures -->
            <?php echo $WeatherBitResult->data[0]->temp; ?>&deg;C
            <!-- Current temperature -2 as placeholder -->
            <span class="min-temperature"><?php echo $WeatherBitResult->data[0]->temp -2; ?>&deg;C</span>
        </div>
    </div>

</body>
</html>
