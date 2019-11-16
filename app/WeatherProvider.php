<?php

interface WeatherProvider
{

 public function getProviderName(): string;

 public function getCurrentWeather(string $location): WeatherDetails;
}