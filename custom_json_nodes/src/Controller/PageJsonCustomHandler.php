<?php

namespace Drupal\custom_json_nodes\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Returns responses for page json request.
 */
class PageJsonCustomHandler extends ControllerBase {

  /**
   * Provide JSON representation of a page.
   *
   * @param string $apikey
   *   The site API Key to for end consumer validation.
   *
   * @param int $nid
   *   Node id of requested page.
   *
   * @return JSON
   *   JSON response of page.
   */
  public function getNodeJson($apikey, $nid) {
    $site_config =  \Drupal::config('system.site');
    $data;

    //Validate site API Key.
    if($site_config->get('siteapikey') != '' 
    && $site_config->get('siteapikey') == $apikey) {
      //Load requested node
      $node = \Drupal::entityTypeManager()->getStorage('node')->load($nid);
      if(!empty($node) && $node->getType() == 'page') {
        //Initiate serilizer service.
        $serializer = \Drupal::service('serializer');
        $data = $serializer->serialize($node, 'json', ['plugin_id' => 'entity']);
      }
      else {
        // Throw access denied error.
        throw new AccessDeniedHttpException();
      }
    }
    else {
      // Throw access denied error.
      throw new AccessDeniedHttpException();
    }

    return JsonResponse::fromJsonString($data);
  }
}
