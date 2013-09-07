# Statamic Twitter Embed Plugin

This plugin allows you to quickly & easily embed public Twitter Tweets into [Statamic](http://statamic.com)-powered websites.

You can [see it in action](http://andreademers.com/statamic-twitter-embed-plugin) on my personal site, [andreademers.com](http://andreademers.com).

To learn more about Embedded Tweets, check out:

* Twitter Developers [Embedded Tweets documentation](https://dev.twitter.com/docs/embedded-tweets)
* Twitter Developers [GET statuses/oembed documentation](https://dev.twitter.com/docs/api/1.1/get/statuses/oembed)

## Installation

1. Download the files, and copy the `twitter_embed` folder to the `_add-ons` directory.
2. Make sure that the path is `/_add-ons/twitter_embed`.

## Usage

### Tag
    
    {{ twitter_embed:tweet }}

### Parameters

All parameters are optional except for `id`.

#### `id` _(required)_

Specifies the __id__ of the Tweet to embed.

The `id` for Tweet `https://twitter.com/ademers/status/376108150048686080` is `376108150048686080`.

For example:

    {{ twitter_embed:tweet id="376108150048686080" }}

#### maxwidth

Specifies the maximum width in pixels that the Embedded Tweet should be rendered at. It is constrained to be between 250 and 550 pixels.

For example:

    {{ twitter_embed:tweet id="376108150048686080" maxwidth="400" }}

#### hide_media

Specifies whether to include images in the Embedded Tweet.

Set to `true` to hide.

For example:

    {{ twitter_embed:tweet id="376108150048686080" hide_media="true" }}

#### hide_thread

Specifies whether to hide _parent_ Tweet.

If the Embedded Tweet is a reply to another Tweet, set to `true` to hide the original (parent) Tweet.

For example:

    {{ twitter_embed:tweet id="376108150048686080" hide_thread="true" }}

#### omit_script

Set to `true` to omit `<script src="//platform.twitter.com/widgets.js" charset="utf-8"></script>` from the Embedded Tweet HTML.

Only one of `widgets.js` needs to be included per page. Therefore, if you have multiple Embedded Tweets per page, it is best to omit it and manually add it to HTML just before the closing `</body>` tag as follows:

      <script src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
    </body>

For example:

    {{ twitter_embed:tweet id="376108150048686080" omit_script="true" }}

#### align

Specifies the alignment of the Embedded Tweet.

Possible values: `left`, `right`, `center`. Alignment styles are not specified by default.

For example:

    {{ twitter_embed:tweet id="376108150048686080" align="center" }}

#### lang

Specifies the language of the _Follow_ button, _Favorites_ count, _Reply_, _Retweet_, and _Favorite_ links of the Embedded Tweet.

For example:

    {{ twitter_embed:tweet id="376108150048686080" lang="fr" }}
