<?php

/**
 * Spotify API Bundle for Symfony2
 *
 * @author Arnaud de Mouhy <arnaud.demouhy@akerbis.com>
 * @since 2016
 */

namespace Mmoreram\SpotifyApiBundle\Entity;

/**
 * Spotify Album image entity
 */
class SpotifyImage
{

    /**
     * AvailableMarkets
     *
     * @var string
     */
    protected $url;

    /**
     * Width of the image
     *
     * @var integer
     */
    protected $width;

    /**
     * Height of the image
     *
     * @var integer
     */
    protected $height;

    /**
     * Return image URL
     *
     * @return string Image URL
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set image URL
     *
     * @param string $url Image URL
     *
     * @return SpotifyImage self Object
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Return image width
     *
     * @return string Image width
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set image width
     *
     * @param string $width Image width
     *
     * @return SpotifyImage self Object
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Return image height
     *
     * @return string Image height
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set image height
     *
     * @param string $url Image height
     *
     * @return SpotifyImage self Object
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

}
