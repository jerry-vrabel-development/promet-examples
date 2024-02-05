<?php

namespace Drupal\prometcustom;

use Drupal\Component\Serialization\Json;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;

/**
 * Service class for interacting with TheDogAPI.
 */
class ApiIntegrationService {

  /**
   * The HTTP client.
   *
   * @var \GuzzleHttp\ClientInterface
   */
  protected $httpClient;

  /**
   * The logger factory.
   *
   * @var \Drupal\Core\Logger\LoggerChannelFactoryInterface
   */
  protected $logger;

  /**
   * Constructs a new ApiIntegrationService object.
   *
   * @param \GuzzleHttp\ClientInterface $http_client
   *   The HTTP client.
   * @param \Drupal\Core\Logger\LoggerChannelFactoryInterface $logger_factory
   *   The logger factory.
   */
  public function __construct(ClientInterface $http_client, LoggerChannelFactoryInterface $logger_factory) {
    $this->httpClient = $http_client;
    $this->logger = $logger_factory->get('prometcustom');
  }

  /**
   * Fetches random dog data from TheDogAPI.
   *
   * @return array|null
   *   The API response data or NULL on failure.
   */
  public function fetchRandomDog() {
    $url = 'https://api.thedogapi.com/v1/images/search';
    $apiKey = getenv('THE_DOG_API_KEY'); // Retrieve API key from .env variable


    try {
      $response = $this->httpClient->request('GET', $url, [
        'headers' => [
          'x-api-key' => $apiKey,
        ],
      ]);

      if ($response->getStatusCode() == 200) {
        $data = Json::decode($response->getBody());
        return $data;
      }
    } catch (RequestException $e) {
      $this->logger->error('Failed to fetch data from TheDogAPI: @message', ['@message' => $e->getMessage()]);
    }

    return NULL;
  }

}
