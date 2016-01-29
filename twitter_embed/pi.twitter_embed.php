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
      'url'         => $this->fetchParam('url', null),
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

      // Hash request url for caching
      $file_name = md5($request_url);

      // If not already cached or if cache 2 weeks or older, cache it
      if (!$this->cache->exists($file_name) || $this->cache->getAge($file_name) >= 1209600) {
        // Get json request as string
        $contents = file_get_contents($request_url);

        // Decode json string
        $response = json_decode($contents);

        // Store html from json string in cache
        $this->cache->put($file_name, $response->html);
      }

      // Output html from json string from cache
      return $this->cache->get($file_name);
    } elseif (isset($params['url'])) {
      // Twitter API
      $resource_url = 'https://api.twitter.com/1/statuses/oembed.json?';

      // Build request url
      $request_url = $resource_url . http_build_query($params);

      // Hash request url for caching
      $file_name = md5($request_url);

      // If not already cached or if cache 2 weeks or older, cache it
      if (!$this->cache->exists($file_name) || $this->cache->getAge($file_name) >= 1209600) {
        // Get json request as string
        $contents = file_get_contents($request_url);

        // Decode json string
        $response = json_decode($contents);

        // Store html from json string in cache
        $this->cache->put($file_name, $response->html);
      }

      // Output html from json string from cache
      return $this->cache->get($file_name);
    }
  }
}
