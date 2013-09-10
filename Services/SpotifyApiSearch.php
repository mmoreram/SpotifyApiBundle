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
     * @param string $search_keys Search query
     * 
     * @return array results
     */
    public function findFirstArtist($search_keys) {

        $results = $this->findArtist($search_keys);

        return reset($results);
    }


    /**
     * Given a custom search, return Artists
     * 
     * @param string  $search_keys Search query
     * @param integer $page        Page
     * 
     * @return array results
     */
    public function findArtist($search_keys, $page = 1) {

        return $this->get(
            $this->baseUrl . 'search/1/artist?q=' . $this->normalizeQuery($search_keys) . '&page=' . ((int) $page)
        );
    }


    /**
     * Given a custom search, return first found Artist
     * 
     * @param string $search_keys Search query
     * 
     * @return array results
     */
    public function findFirstAlbum($search_keys) {

        $results = $this->findAlbum($search_keys);

        return reset($results);
    }


    /**
     * Given a custom search, return Albums
     * 
     * @param string  $search_keys Search query
     * @param integer $page        Page
     * 
     * @return array results
     */
    public function findAlbum($search_keys, $page = 1) {

        return $this->get(
            $this->baseUrl . 'search/1/album?q=' . $this->normalizeQuery($search_keys) . '&page=' . ((int) $page)
        );  
    }


    /**
     * Given a custom search, return first found Track
     * 
     * @param string $search_keys Search query
     * 
     * @return array results
     */
    public function findFirstTrack($search_keys) {

        $results = $this->findTrack($search_keys);

        return reset($results);
    }


    /**
     * Given a custom search, return Tracks
     * 
     * @param string  $search_keys Search query
     * @param integer $page        Page
     * 
     * @return array results
     */
    public function findTrack($search_keys, $page = 1) {

        return $this->get(
            $this->baseUrl . 'search/1/track?q=' . $this->normalizeQuery($search_keys) . '&page=' . ((int) $page)
        ); 
    }
}