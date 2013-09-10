<?php

/**
 * Spotify API Bundle for Symfony2
 * 
 * @author Marc Morera <yuhu@mmoreram.com>
 * @since 2013
 */

namespace Mmoreram\SpotifyApiBundle\Services;


/**
 * SpotifyApiLookup class
 */
class SpotifyApiLookup extends SpotifyApi
{

    /**
     * Without extras
     * 
     * @var string
     */
    const EXTRAS_NONE = '';


    /**
     * With album extras
     * 
     * @var string
     */
    const EXTRAS_ALBUM = 'album';


    /**
     * With album detailed extras
     * 
     * @var string
     */
    const EXTRAS_ALBUMDETAIL = 'albumdetail';


    /**
     * With tracks extras
     * 
     * @var string
     */
    const EXTRAS_TRACK = 'track';


    /**
     * With track detail extras
     * 
     * @var string
     */
    const EXTRAS_TRACKDETAIL = 'trackdetail';


    /**
     * Given a Spotify Artist url, return the related Artist
     * 
     * @param String $url    Url of artist
     * @param String $extras Extras value
     * 
     * @return SpotifyArtist Artist loaded
     */
    public function getArtist($url, $extras = self::EXTRAS_ALBUMDETAIL)
    {
        return $this->get(
            $this->baseUrl . 'lookup/1/?uri=' . $url . '&extras=' . $extras
        );
    }


    /**
     * Given a Spotify Album url, return the related Album
     * 
     * @param String $url    Url of album
     * @param String $extras Extras value
     * 
     * @return SpotifyAlbum Album loaded
     */
    public function getAlbum($url, $extras = self::EXTRAS_TRACKDETAIL)
    {
        return $this->get(
            $this->baseUrl . 'lookup/1/?uri=' . $url . '&extras=' . $extras
        );
    }


    /**
     * Given a Spotify Track url, return the related Track
     * 
     * @param String $url Url of track
     * 
     * @return SpotifyTrack Track loaded
     */
    public function getTrack($url)
    {
        return $this->get(
            $this->baseUrl . 'lookup/1/?uri=' . $url
        );
    }
}