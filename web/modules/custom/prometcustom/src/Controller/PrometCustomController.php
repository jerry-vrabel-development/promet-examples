<?php

namespace Drupal\prometcustom\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\prometcustom\src\ApiIntegrationService;

class PrometCustomController extends ControllerBase {
  protected $apiIntegrationService;

  public function __construct(ApiIntegrationService $api_integration_service) {
    $this->apiIntegrationService = $api_integration_service;
  }

  public function content() {
    $dogData = $this->apiIntegrationService->fetchRandomDog();

    return [
      '#theme' => 'codereview',
      '#dog_data' => $dogData,
    ];
  }
}
