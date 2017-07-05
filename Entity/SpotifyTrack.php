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
     * Artists
     *
     * @var array
     */
    protected $artists;

    /**
     * Track Album
     *
     * @var Mmoreram\SpotifyApiBundle\Entity\SpotifyAlbum
     */
    protected $album;

    /**
     * AvailableMarkets
     *
     * @var array
     */
    protected $availableMarkets;

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
    protected $duration;

    /**
     * Return artists
     *
     * @return array Artists stored
     */
    public function getArtists()
    {
        return $this->artists;
    }

    /**
     * Add local Artist
     *
     * @param SpotifyArtist $artist Artist to add
     *
     * @return SpotifyAlbum self Object
     */
    public function addArtist($artist)
    {
        if (!in_array($artist, $this->artists)) {
            $this->artists[] = $artist;
        }

        return $this;
    }

    /**
     * Store locally Artists
     *
     * @param array $artists Artists list to set
     *
     * @return SpotifyAlbum self Object
     */
    public function setArtists($artists)
    {
        $this->artists = $artists;

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
     * Get availableMarkets where this album is available
     *
     * @return array AvailableMarkets
     */
    public function getAvailableMarkets()
    {
        return $this->availableMarkets;
    }

    /**
     * Return if Albus is available to desired availableMarket
     *
     * @param String $availableMarket AvailableMarket
     *
     * @return boolean Is available
     */
    public function hasAvailableMarket($availableMarket)
    {
        return is_array($this->availableMarkets) && in_array($availableMarket, $this->availableMarkets);
    }

    /**
     * Store locally availableMarkets
     *
     * @param array $availableMarkets AvailableMarkets to set
     *
     * @return SpotifyTrack self Object
     */
    public function setAvailableMarkets($availableMarkets)
    {
        $this->availableMarkets = $availableMarkets;

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
     * @param integer $trackNumber Track number
     *
     * @return SpotifyTrack self Object
     */
    public function setTrackNumber($trackNumber)
    {
        $this->trackNumber = $trackNumber;

        return $this;
    }

    /**
     * Return duration
     *
     * @return integer Duration
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Sets lentgh
     *
     * @param integer $duration Track duration
     *
     * @return SpotifyTrack self Object
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

}
