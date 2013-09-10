<?php

/**
 * Spotify API Bundle for Symfony2
 * 
 * @author Marc Morera <yuhu@mmoreram.com>
 * @since 2013
 */

namespace Mmoreram\SpotifyApiBundle\Entity;


/**
 * Spotify Track entity
 */
class SpotifyTrack extends SpotifyEntityBase
{
    
    /**
     * Artist
     * 
     * @var Mmoreram\SpotifyApiBundle\Entity\SpotifyArtist
     */
    protected $artist;


    /**
     * Track Album
     * 
     * @var Mmoreram\SpotifyApiBundle\Entity\SpotifyAlbum
     */
    protected $album;


    /**
     * Territories
     * 
     * @var array
     */
    protected $territories;


    /**
     * Track number
     * 
     * @var integer
     */
    protected $trackNumber;


    /**
     * Lnegth
     * 
     * @var integer
     */
    protected $length;


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
     * Get artist album
     * 
     * @return SpotifyAlbum album
     */
    public function getAlbum()
    {
        return $this->album;
    }


    /**
     * Set album
     * 
     * @param SpotifyAlbum $album Album to set
     * 
     * @return SpotifyTrack self Object
     */
    public function setAlbum($album)
    {
        $this->album = $album;

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
     * @return SpotifyTrack self Object
     */
    public function setTerritories($territories)
    {
        $this->territories = $territories;

        return $this;
    }


    /**
     * Return track number
     * 
     * @return integer track number
     */
    public function getTrackNumber()
    {

        return $this->trackNumber;
    }

    /**
     * Sets track number
     * 
     * @param integer $track_number Track number
     * 
     * @return SpotifyTrack self Object
     */
    public function setTrackNumber($track_number)
    {
        $this->trackNumber = $track_number;

        return $this;
    }


    /**
     * Return length
     * 
     * @return integer Length
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Sets lentgh
     * 
     * @param integer $length Track length
     * 
     * @return SpotifyTrack self Object
     */
    public function setLength($length)
    {
        $this->length = $lentgh;

        return $this;
    }

}