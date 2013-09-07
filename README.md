# Statamic Twitter Embed Plugin

This plugin allows you to quickly & easily embed public Twitter Tweets into [Statamic](http://statamic.com)-powered websites.

You can [see it in action](http://andreademers.com/statamic-twitter-embed-plugin) on my personal site, [andreademers.com](http://andreademers.com).

To learn more about Embedded Tweets, check out:

* Twitter Developers [Embedded Tweets documentation](https://dev.twitter.com/docs/embedded-tweets)
* Twitter Developers [GET statuses/oembed documentation](https://dev.twitter.com/docs/api/1.1/get/statuses/oembed)

## Installation

1. Download the files, and copy them to `/_add-ons/twitter_embed`.
2. Make sure that the folder name is `twitter_embed`.

## Usage

### Tag
    
    {{ twitter_embed:tweet }}

### Parameters

All parameters are optional except for `id`.

#### `id` _(required)_

This is the __id__ of the public tweet you wish to embed.

The `id` for tweet `https://twitter.com/ademers/status/376108150048686080` is `376108150048686080`.

For example:

    {{ twitter_embed:tweet id="376108150048686080" }}

#### maxwidth

The maximum width in pixels that the embed should be rendered at. This value is constrained to be between 250 and 550 pixels.

For example:

    {{ twitter_embed:tweet id="376108150048686080" maxwidth="400" }}

#### hide_media

To hide images in tweet, set to `true`. Default is `false`.

For example:

    {{ twitter_embed:tweet id="376108150048686080" hide_media="true" }}

#### hide_thread

If the tweet is a reply to another tweet, set to `true` to hide the original (parent) tweet.

For example:

    {{ twitter_embed:tweet id="376108150048686080" hide_thread="true" }}

#### omit_script

Set to `true` to omit `<script src="//platform.twitter.com/widgets.js" charset="utf-8"></script>` from the embedded Tweet HTML.

Only one of `widgets.js` needs to be included per page, so if you have multiple Embedded Tweets per page, it is best to omit it and manually add it to HTML just before closing `</body>` tag as follows:

      <script src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
    </body>

For example:

    {{ twitter_embed:tweet id="376108150048686080" omit_script="true" }}

#### align

Specifies alignment of Embedded Tweet.

Possible values: 'left`, `right`, `center`. Alignment styles are not specified by default.

For example:

    {{ twitter_embed:tweet id="376108150048686080" align="center" }}

#### lang

Specifies the language of Follow button, Favorites count, Replym, Retweet, and Favorite links of the Embedded Tweet.

For example:

    {{ twitter_embed:tweet id="376108150048686080" lang="fr" }}
