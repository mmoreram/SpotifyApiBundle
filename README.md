SpotifyApiBundle for Symfony2
---

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

You can search a simple artist name, getting an Array of Artists

    $page = 1;

    artists = $this
        ->container
        ->get('spotify.api.search')
        ->findArtist('Hans Zimmer', $page);

You can also search also a simple artist name, getting only first Artist

    artists = $this
        ->container
        ->get('spotify.api.search')
        ->findFirstArtist('Hans Zimmer');



