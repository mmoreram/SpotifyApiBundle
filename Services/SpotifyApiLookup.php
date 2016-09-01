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
     * @param String $id     Id of artist
     *
     * @return SpotifyArtist Artist loaded
     */
    public function getArtist($id)
    {
        return $this->get(
            $this->baseUrl . 'v1/artists/' . $id
        );
    }

    /**
     * Given a Spotify Album url, return the related Album
     *
     * @param String $id     Id of album
     *
     * @return SpotifyAlbum Album loaded
     */
    public function getAlbum($id)
    {
        return $this->get(
            $this->baseUrl . 'v1/albums/' . $id
        );
    }

    /**
     * Given a Spotify Track url, return the related Track
     *
     * @param String $id    Id of track
     *
     * @return SpotifyTrack Track loaded
     */
    public function getTrack($id)
    {
        return $this->get(
            $this->baseUrl . 'v1/tracks/' . $id
        );
    }
}
