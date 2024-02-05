<?php

namespace Drupal\prometcustom\Controller;

use Drupal\prometcustom\ApiIntegrationService;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Controller\ControllerBase;

class PrometCustomController extends ControllerBase {
  protected $apiIntegrationService;

  public function __construct(ApiIntegrationService $apiIntegrationService) {
    $this->apiIntegrationService = $apiIntegrationService;
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('prometcustom.api_integration_service')
    );
  }

  public function content() {
    $dogData = $this->apiIntegrationService->fetchRandomDog();

    return [
      '#theme' => 'codereview',
      '#dog_data' => $dogData,
    ];
  }
}
