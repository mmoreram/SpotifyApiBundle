<?php

/**
 * Spotify API Bundle for Symfony2
 *
 * @author Marc Morera <yuhu@mmoreram.com>
 * @since 2013
 */

namespace Mmoreram\SpotifyApiBundle\Services;

/**
 * Service to search entities given a search query
 */
class SpotifyApiSearch extends SpotifyApi
{

    /**
     * Given a custom search, return first found Artist
     *
     * @param string $searchKeys Search query
     *
     * @return array results
     */
    public function findFirstArtist($searchKeys)
    {
        $results = $this->findArtist($searchKeys);

        return reset($results);
    }

    /**
     * Given a custom search, return Artists
     *
     * @param string  $searchKeys Search query
     * @param integer $page       Page
     *
     * @return array results
     */
    public function findArtist($searchKeys, $page = 1)
    {
        return $this->get(
            $this->baseUrl . 'search/1/artist?q=' . $this->normalizeQuery($searchKeys) . '&page=' . ((int) $page)
        );
    }

    /**
     * Given a custom search, return first found Artist
     *
     * @param string $searchKeys Search query
     *
     * @return array results
     */
    public function findFirstAlbum($searchKeys)
    {
        $results = $this->findAlbum($searchKeys);

        return reset($results);
    }

    /**
     * Given a custom search, return Albums
     *
     * @param string  $searchKeys Search query
     * @param integer $page       Page
     *
     * @return array results
     */
    public function findAlbum($searchKeys, $page = 1)
    {
        return $this->get(
            $this->baseUrl . 'search/1/album?q=' . $this->normalizeQuery($searchKeys) . '&page=' . ((int) $page)
        );
    }

    /**
     * Given a custom search, return first found Track
     *
     * @param string $searchKeys Search query
     *
     * @return array results
     */
    public function findFirstTrack($searchKeys)
    {
        $results = $this->findTrack($searchKeys);

        return reset($results);
    }

    /**
     * Given a custom search, return Tracks
     *
     * @param string  $searchKeys Search query
     * @param integer $page       Page
     *
     * @return array results
     */
    public function findTrack($searchKeys, $page = 1)
    {
        return $this->get(
            $this->baseUrl . 'search/1/track?q=' . $this->normalizeQuery($searchKeys) . '&page=' . ((int) $page)
        );
    }
}
