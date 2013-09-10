<?php

/**
 * Spotify API Bundle for Symfony2
 * 
 * @author Marc Morera <yuhu@mmoreram.com>
 * @since 2013
 */

namespace Mmoreram\SpotifyApiBundle\Entity;


/**
 * Spotify Album entity
 */
class SpotifyAlbum extends SpotifyEntityBase
{

    /**
     * Artist
     * 
     * @var Mmoreram\SpotifyApiBundle\Entity\SpotifyArtist
     */
    protected $artist;


    /**
     * Released variable
     * 
     * @var string
     */
    protected $released;


    /**
     * Territories
     * 
     * @var array
     */
    protected $territories;


    /**
     * Return Artist
     * 
     * @return SpotifyArtist Artist stored
     */
    public function getArtist()
    {

        return $this->artist;
    }


    /**
     * Store locally Artist
     * 
     * @param SpotifyAlbum $artist Artist to set
     * 
     * @return SpotifyAlbum self Object
     */
    public function setArtist(SpotifyArtist $artist = null)
    {
        $this->artist = $artist;

        return $this;
    }


    /**
     * Return released value
     * 
     * @return String Released valur
     */
    public function getReleased()
    {

        return $this->released;
    }

    /**
     * Store locally released value
     * 
     * @param String $released Released value to set
     * 
     * @return SpotifyAlbum self Object
     */
    public function setReleased($released)
    {
        $this->released = $released;

        return $this;
    }


    /**
     * Get territories where this album is available
     * 
     * @return array Territories
     */
    public function getTerritories()
    {

        return $this->territories;
    }


    /**
     * Return if Albus is available to desired territory
     * 
     * @param String $territory Territory
     * 
     * @return boolean Is available
     */
    public function hasTerritory($territory)
    {

        return is_array($this->territories) && in_array($territory, $this->territories);
    }


    /**
     * 
     * Store locally territories
     * 
     * @param array $territories Territories to set
     * 
     * @return SpotifyAlbum self Object
     */
    public function setTerritories($territories)
    {
        $this->territories = $territories;

        return $this;
    }
}