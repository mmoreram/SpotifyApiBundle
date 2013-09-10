<?php

/**
 * Spotify API Bundle for Symfony2
 * 
 * @author Marc Morera <yuhu@mmoreram.com>
 * @since 2013
 */

namespace Mmoreram\SpotifyApiBundle\Entity;


/**
 * Spotify Artist entity
 */
class SpotifyArtist extends SpotifyEntityBase
{

    /**
     * Artist albums
     * 
     * @var array
     */
    protected $albums;


    /**
     * Get all artist albums
     * 
     * @return array albums
     */
    public function getAlbums()
    {
        return $this->albums;
    }


    /**
     * Set albums
     * 
     * @param array $albums Albums to set
     * 
     * @return SpotifyArtist self Object
     */
    public function setAlbums(array $albums = null)
    {
        $this->albums = $albums;

        return $this;
    }
}