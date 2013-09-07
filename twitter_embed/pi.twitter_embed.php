<?php
class Plugin_twitter_embed extends Plugin {

  var $meta = array(
    'name'       => 'Twitter Embed',
    'version'    => '1.0',
    'author'     => 'Andrea DeMers',
    'author_url' => 'http://andreademers.com'
  );

  public function tweet() {

    // Parameters
    $params = array(
      'id'          => $this->fetchParam('id', null),
      'maxwidth'    => $this->fetchParam('maxwidth', null),
      'hide_media'  => $this->fetchParam('hide_media', null),
      'hide_thread' => $this->fetchParam('hide_thread', null),
      'omit_script' => $this->fetchParam('omit_script', null),
      'align'       => $this->fetchParam('align', null),
      'lang'        => $this->fetchParam('lang', null)
    );

    // Make sure tweet id is present
    if (isset($params['id'])) {

      // Twitter API
      $resource_url = 'https://api.twitter.com/1/statuses/oembed.json?';

      // Build request url
      $request_url = $resource_url . http_build_query($params);

      // Get json request as string
      $contents = file_get_contents($request_url);

      // Decode json string
      $response = json_decode($contents);

      // Output html from json string
      return $response->html;
    }
  }
}