SpotifyApiBundle for Symfony2
---

Table of contents
-----
1. [Installing SpotifyApiBundle](#installing-spotifyapibundle)
2. [API](#api)
3. [Contribute](#contribute)

Installing [G]
---

You have to add require line into you composer.json file

    "require": {
        "php": ">=5.3.3",
        "symfony/symfony": "2.3.*",
        ...
        "mmoreram/gearman-bundle": "dev-master"
    },

Then you have to use composer to update your project dependencies

    php composer.phar update

And register the bundle in your appkernel.php file

    return array(
        // ...
        new Liip\DoctrineCacheBundle\LiipDoctrineCacheBundle(),
        new Mmoreram\GearmanBundle\GearmanBundle(),
        // ...
    );