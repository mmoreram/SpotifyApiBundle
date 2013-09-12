[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/mmoreram/SpotifyApiBundle/badges/quality-score.png?s=963c9aa24957514a35b451d215e4b82316f789ac)](https://scrutinizer-ci.com/g/mmoreram/SpotifyApiBundle/)

SpotifyApiBundle for Symfony2
---

> This bundle is only a wrapper of Spotify Api for all Symfony2 developers.  
> You can find all API specification [here](https://developer.spotify.com/technologies/web-api/)

Table of contents
-----
1. [Installing SpotifyApiBundle](#installing-spotifyapibundle)
2. [API Search](#api-search)
3. [API Lookup](#api-lookup)
3. [Contribute](#contribute)

Installing [SpotifyApiBundle](https://github.com/mmoreram/SpotifyApiBundle)
---

You have to add require line into you composer.json file

    "require": {
        "php": ">=5.3.3",
        "symfony/symfony": "2.3.*",
        ...
        "mmoreram/spotify-api-bundle": "dev-master"
    },

Then you have to use composer to update your project dependencies

    php composer.phar update

And register the bundle in your appkernel.php file

    return array(
        // ...
        new Mmoreram\SpotifyApiBundle\SpotifyApiBundle(),
        // ...
    );

API Search
---

You can search a simple artist name, getting an array of Artists, with a maximum of 100 results

    $page = 1;

    $artists = $this
        ->container
        ->get('spotify.api.search')
        ->findArtist('Hans Zimmer', $page);

You can also search also a simple artist name, getting only first Artist

    $artists = $this
        ->container
        ->get('spotify.api.search')
        ->findFirstArtist('Hans Zimmer');

You can search a simple Album name, getting an array of Albums, with a maximum of 100 results

    $page = 1;

    $albums = $this
        ->container
        ->get('spotify.api.search')
        ->findAlbums("Pirate of the Caribbean, at world's end", $page);

You can also search also a simple artist name, getting only first Artist

    $albums = $this
        ->container
        ->get('spotify.api.search')
        ->findFirstAlbum("Pirate of the Caribbean, at world's end");

You can search a simple Track name, getting an array of Tracks, with a maximum of 100 results

    $page = 1;

    $tracks = $this
        ->container
        ->get('spotify.api.search')
        ->findTracks("I don't think now is the best time", $page);

You can also search also a simple artist name, getting only first Artist

    $tracks = $this
        ->container
        ->get('spotify.api.search')
        ->findFirstTrack("I don't think now is the best time");

API Lookup
---

Given an artist code, you can get all related information by using the Spitify Api Lookup service

    $artist = $this
        ->container
        ->get('spotify.api.search')
        ->getArtist('spotify:artist:0YC192cP3KPCRWx8zr8MfZ');

Given an album code, you can also get all related information it

    $album = $this
        ->container
        ->get('spotify.api.search')
        ->getAlbum('spotify:album:6JoI0NEAqeJ20X6lU3Drx0');

And given a track code, you can also get all related information about it

    $track = $this
        ->container
        ->get('spotify.api.search')
        ->getTrack('spotify:track:5sbwYsgzeg7wsug1A1pTiO');


Contribute
-----

All code is Symfony2 Code formatted, so every pull request must validate phpcs standards.  
You should read [Symfony2 coding standards](http://symfony.com/doc/current/contributing/code/standards.html) and install [this](https://github.com/opensky/Symfony2-coding-standard) CodeSniffer to check all code is validated.  

There is also a policy for contributing to this project. All pull request must be all explained step by step, to make us more understandable and easier to merge pull request. All new features must be tested with PHPUnit.
