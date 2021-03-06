<?php

namespace paskuale75\weather;

use Yii;
use yii\base\Widget;
use GuzzleHttp\Client;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\base\InvalidParamException;
use GuzzleHttp\Exception\RequestException;

class WeatherForcast extends Widget
{
    /**
     * @var string
     */
    public $key;
    /**
     * @var string
     */
    public $dataType = 'json';

    /**
     * @var string
     */
    public $apiUrl = 'https://restapi.amap.com/v3/weather/weatherInfo';

    /**
     * @var array
     */
    public $guzzleOptions = [];

    /**
     * @throws InvalidConfigException
     */
    public function init()
    {
        if ($this->key === null) {
            throw new InvalidConfigException('The "key" property must be set.');
        }
    }

    /**
     * @return Client
     */
    public function getHttpClient()
    {
        return new Client($this->guzzleOptions);
    }

    /**
     * @param array $options
     */
    public function setGuzzleOptions(array $options)
    {
        $this->guzzleOptions = $options;
    }

    /**
     * @param $city
     * @param string $format
     * @return mixed|string
     */
    public function getLiveWeather($city, $format = 'json')
    {
        return $this->getWeather($city, 'base', $format);
    }

    /**
     * @param $city
     * @param string $format
     * @return mixed|string
     */
    public function getForecastsWeather($city, $format = 'json')
    {
        return $this->getWeather($city, 'all', $format);
    }

    /**
     * @param $city
     * @param string $type
     * @param string $format
     * @return mixed|string
     */
    public function getWeather($city, $type = 'base', $format = 'json')
    {
        if (!\in_array(\strtolower($format), ['xml', 'json'])) {
            throw new InvalidParamException('Invalid response format: ' . $format);
        }

        if (!\in_array(\strtolower($type), ['base', 'all'])) {
            throw new InvalidParamException('Invalid type value(base/all): ' . $type);
        }

        $query = array_filter([
            'key' => $this->key,
            'city' => $city,
            'output' => \strtolower($format),
            'extensions' => \strtolower($type),
        ]);

        try {
            $response = $this->getHttpClient()->get($this->apiUrl, [
                'query' => $query,
            ])->getBody()->getContents();

            return 'json' === $format ? \json_decode($response, true) : $response;
        } catch (\Exception $e) {
            throw new RequestException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
