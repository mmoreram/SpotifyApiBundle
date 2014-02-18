SpotifyApiBundle for Symfony2
=====
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/7980c1e5-b430-4264-8d30-d6e2ef68d0d8/mini.png)](https://insight.sensiolabs.com/projects/7980c1e5-b430-4264-8d30-d6e2ef68d0d8)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/mmoreram/SpotifyApiBundle/badges/quality-score.png?s=963c9aa24957514a35b451d215e4b82316f789ac)](https://scrutinizer-ci.com/g/mmoreram/SpotifyApiBundle/)
[![Latest Stable Version](https://poser.pugx.org/mmoreram/spotify-api-bundle/v/stable.png)](https://packagist.org/packages/mmoreram/spotify-api-bundle)
[![Latest Unstable Version](https://poser.pugx.org/mmoreram/spotify-api-bundle/v/unstable.png)](https://packagist.org/packages/mmoreram/spotify-api-bundle)
[![Dependency Status](https://www.versioneye.com/user/projects/52ab6d2b632bac54800000e3/badge.png)](https://www.versioneye.com/user/projects/52ab6d2b632bac54800000e3)
[![Total Downloads](https://poser.pugx.org/mmoreram/spotify-api-bundle/downloads.png)](https://packagist.org/packages/mmoreram/spotify-api-bundle)

> This bundle is only a wrapper of Spotify Api for all Symfony2 developers.
> You can find all API specification [here](https://developer.spotify.com/technologies/web-api/)

Table of contents
-----
1. [Installing/Configuring](#installingconfiguring)
    * [Tags](#tags)
    * [Installing SpotifyApiBundle](#installing-spotifyapibundle)
2. [API Search](#api-search)
3. [API Lookup](#api-lookup)
3. [Contribute](#contribute)

Installing/Configuring
---

## Tags

* Use version `1.0-dev` for last updated. Alias of `dev-master`.
* Use last stable version tag to stay in a stable release.

## Installing [SpotifyApiBundle](https://github.com/mmoreram/SpotifyApiBundle)

You have to add require line into you composer.json file

``` json
"require": {
    "php": ">=5.3.3",
    "symfony/symfony": "2.3.*",

    "mmoreram/spotify-api-bundle": "dev-master"
}
```

Then you have to use composer to update your project dependencies

```bash
$ php composer.phar update
```

And register the bundle in your appkernel.php file

``` php
return array(
    // ...
    new Mmoreram\SpotifyApiBundle\SpotifyApiBundle(),
    // ...
);
```

API Search
---

You can search a simple artist name, getting an array of Artists, with a maximum of 100 results

``` php
$page = 1;

$artists = $this
    ->container
    ->get('spotify.api.search')
    ->findArtist('Hans Zimmer', $page);
```

You can also search also a simple artist name, getting only first Artist

``` php
$artists = $this
    ->container
    ->get('spotify.api.search')
    ->findFirstArtist('Hans Zimmer');
```

You can search a simple Album name, getting an array of Albums, with a maximum of 100 results

``` php
$page = 1;

$albums = $this
    ->container
    ->get('spotify.api.search')
    ->findAlbums("Pirate of the Caribbean, at world's end", $page);
```

You can also search also a simple artist name, getting only first Artist

``` php
$albums = $this
    ->container
    ->get('spotify.api.search')
    ->findFirstAlbum("Pirate of the Caribbean, at world's end");
```

You can search a simple Track name, getting an array of Tracks, with a maximum of 100 results

``` php
$page = 1;

$tracks = $this
    ->container
    ->get('spotify.api.search')
    ->findTracks("I don't think now is the best time", $page);
```

You can also search also a simple artist name, getting only first Artist

``` php
$tracks = $this
    ->container
    ->get('spotify.api.search')
    ->findFirstTrack("I don't think now is the best time");
```

API Lookup
---

Given an artist code, you can get all related information by using the Spitify Api Lookup service

``` php
$artist = $this
    ->container
    ->get('spotify.api.search')
    ->getArtist('spotify:artist:0YC192cP3KPCRWx8zr8MfZ');
```

Given an album code, you can also get all related information it

``` php
$album = $this
    ->container
    ->get('spotify.api.search')
    ->getAlbum('spotify:album:6JoI0NEAqeJ20X6lU3Drx0');
```

And given a track code, you can also get all related information about it

``` php
$track = $this
    ->container
    ->get('spotify.api.search')
    ->getTrack('spotify:track:5sbwYsgzeg7wsug1A1pTiO');
```


Contribute
-----

All code is Symfony2 Code formatted, so every pull request must validate phpcs standards.
You should read [Symfony2 coding standards](http://symfony.com/doc/current/contributing/code/standards.html) and install [this](https://github.com/opensky/Symfony2-coding-standard) CodeSniffer to check all code is validated.

There is also a policy for contributing to this project. All pull request must be all explained step by step, to make us more understandable and easier to merge pull request. All new features must be tested with PHPUnit.

If you'd like to contribute, please read the [Contributing Code][1] part of the documentation. If you're submitting a pull request, please follow the guidelines in the [Submitting a Patch][2] section and use the [Pull Request Template][3].

[1]: http://symfony.com/doc/current/contributing/code/index.html
[2]: http://symfony.com/doc/current/contributing/code/patches.html#check-list
[3]: http://symfony.com/doc/current/contributing/code/patches.html#make-a-pull-request


[![Bitdeli Badge](https://d2weczhvl823v0.cloudfront.net/mmoreram/spotifyapibundle/trend.png)](https://bitdeli.com/free "Bitdeli Badge")

