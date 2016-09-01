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
     * AvailableMarkets
     *
     * @var array
     */
    protected $availableMarkets;

    /**
     * Images
     *
     * @var array
     */
    protected $images;

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
     * Get markets where this album is available
     *
     * @return array Markets
     */
    public function getAvailableMarkets()
    {
        return $this->availableMarkets;
    }

    /**
     * Return if Album is available to desired availableMarket
     *
     * @param String $market Market
     *
     * @return boolean Is available
     */
    public function hasAvailableMarket($markets)
    {
        return is_array($this->availableMarkets) && in_array($market, $this->availableMarkets);
    }

    /**
     * Store locally availableMarkets
     *
     * @param array $markets Markets to set
     *
     * @return SpotifyAlbum self Object
     */
    public function setAvailableMarkets($markets)
    {
        $this->availableMarkets = $markets;

        return $this;
    }

    /**
     * Get images
     *
     * @return array Images
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Add an image
     *
     * @param SpotifyImage $image Image to add
     *
     * @return SpotifyAlbum self Object
     */
    public function addImage($image)
    {
        if (!in_array($image, $this->images)) {
            $this->images[] = $image;
        }

        return $this;
    }

    /**
     * Store images
     *
     * @param array $images Images to set
     *
     * @return SpotifyAlbum self Object
     */
    public function setImages($images)
    {
        $this->images = $images;

        return $this;
    }
}
