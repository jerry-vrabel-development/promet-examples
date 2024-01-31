<?php

namespace Drupal\prometcustom\Controller;
use Drupal\Core\Controller\ControllerBase;

class PrometCustomController extends ControllerBase {
  public function helloWorld() {
    return [
      '#markup' => $this->t('Hello from the Promet Custom Module')
    ];
  }
}
