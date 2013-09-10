<?php

/**
 * Spotify API Bundle for Symfony2
 * 
 * @author Marc Morera <yuhu@mmoreram.com>
 * @since 2013
 */

namespace Mmoreram\SpotifyApiBundle\Mapper;

use Mmoreram\SpotifyApiBundle\Entity\SpotifyArtist;
use Mmoreram\SpotifyApiBundle\Entity\SpotifyAlbum;
use Mmoreram\SpotifyApiBundle\Entity\SpotifyTrack;

/**
 * Mapper base
 */
class SpotifyMapper
{

    /**
     * Given a parsed data, tries to map with Spotify Model
     * 
     * @param array $data Data parsed
     * 
     * @return mixed Entities mapped
     */
    public function map($data)
    {
        switch ($data['info']['type']) {

            case 'artist':

                return $this->mapArtistsData($data);

            case 'album';

                return $this->mapAlbumsData($data);

            case 'track';

                return $this->mapTracksData($data);
        }

        return;
    }


    /**
     * Given a parsed artist data
     * 
     * @param array $data Data parsed
     * 
     * @return mixed Entities mapped
     */
    public function mapArtistsData($data)
    {
        $result = null;

        if (isset($data['artists'])) {

            $result = $this->mapArtists($data['artists']);
        } elseif (isset($data['artist'])) {

            $result = $this->mapArtist($data['artist']);
        }

        return $result;
    }


    /**
     * Given a parsed album data
     * 
     * @param array $data Data parsed
     * 
     * @return mixed Entities mapped
     */
    public function mapAlbumsData($data)
    {
        $result = null;

        if (isset($data['albums'])) {

            $result = $this->mapAlbums($data['albums']);
        } elseif (isset($data['album'])) {

            $result = $this->mapAlbum($data['album']);
        }

        return $result;
    }


    /**
     * Given a parsed track data
     * 
     * @param array $data Data parsed
     * 
     * @return mixed Entities mapped
     */
    public function mapTracksData($data)
    {
        $result = null;

        if (isset($data['tracks'])) {

            $result = $this->mapTracks($data['tracks']);
        } elseif (isset($data['track'])) {

            $result = $this->mapTrack($data['track']);
        }

        return $result;
    }


    /**
     * Map artists given a parsed artists data
     * 
     * @param array $artists Crude artists data
     * 
     * @return array Entities mapped
     */
    public function mapArtists(Array $artists)
    {

        $artistsLoaded = array();

        foreach ($artists as $artist) {

            $artistsLoaded[] = $this->mapArtist($artist);
        }

        return $artistsLoaded;
    }


    /**
     * Map artist given a parsed artist data
     * 
     * @param array $artist Crude artist data
     * 
     * @return SpotifyArtist Artist loaded
     */
    public function mapArtist($artist)
    {

        $artistEntity = new SpotifyArtist();

        $artistEntity = $this->mapCommon($artistEntity, $artist);

        $albumsLoaded = null;

        if (isset($artist['albums']) && is_array($artist['albums'])) {

            $albumsLoaded = array();

            foreach ($artist['albums'] as $album) {

                $albumsLoaded[] = $this->mapAlbum($album['album'], false);
            }
        }

        $artistEntity->setAlbums($albumsLoaded);

        return $artistEntity;
    }


    /**
     * Map albums given a parsed albums data
     * 
     * @param array $albums Crude albums data
     * 
     * @return array Entities mapped
     */
    public function mapAlbums(Array $albums)
    {

        $albumsLoaded = array();

        foreach ($albums as $album) {

            $albumsLoaded[] = $this->mapAlbum($album);
        }

        return $albumsLoaded;
    }


    /**
     * Map album given a parsed album data
     * 
     * @param array   $album     Crude album data
     * @param boolean $recursive If set, also map Artists
     * 
     * @return SpotifyAlbum Album loaded
     */
    public function mapAlbum($album, $recursive = true)
    {
        $albumEntity = new SpotifyAlbum();

        $albumEntity = $this->mapCommon($albumEntity, $album);

        $albumEntity
        ->setTerritories(
            isset($album['territories'])
            ? explode(' ', $album['territories'])
            : null
        )
        ->setArtist(
            $recursive && isset($album['artists']) && isset($album['artists'][0])
            ? $this->mapArtist($album['artists'][0])
            : null
        );

        return $albumEntity;
    }


    /**
     * Map tracks given a parsed tracks data
     * 
     * @param array $tracks Crude tracks data
     * 
     * @return array Entities mapped
     */
    public function mapTracks(Array $tracks)
    {

        $tracksLoaded = array();

        foreach ($tracks as $track) {

            $tracksLoaded[] = $this->mapTrack($track);
        }

        return $tracksLoaded;
    }


    /**
     * Map track given a parsed track data
     * 
     * @param array $track Crude track data
     * 
     * @return SpotifyArtist Artist loaded
     */
    public function mapTrack($track)
    {

        $trackEntity = new SpotifyTrack();

        $trackEntity = $this->mapCommon($trackEntity, $track);

        $trackEntity
        ->setTerritories(
            isset($track['territories'])
            ? explode(' ', $track['territories'])
            : null
        )
        ->setTrackNumber(
            isset($track['track-number'])
            ? $track['track-number']
            : null
        )
        ->setArtist(
            isset($track['artists']) && isset($track['artists'][0])
            ? $this->mapArtist($track['artists'][0])
            : null
        )
        ->setAlbum(
            isset($track['album'])
            ? $this->mapAlbum($track['album'])
            : null
        );

        return $trackEntity;
    }


    /**
     * Given an entity and crude data, fill some common fields
     * 
     * @param SpotifyEntityBase $entity Entity
     * @param array             $data   Crude data
     * 
     * @return SpotifyEntityBase Object with data mapped
     */
    public function mapCommon($entity, $data)
    {

        $entity
        ->setHref(
            isset($data['href'])
            ? $data['href']
            : null
        )
        ->setId(
            isset($data['id'])
            ? $data['id']
            : null
        )
        ->setName(
            isset($data['name'])
            ? $data['name']
            : null
        )
        ->setPopularity(
            isset($data['popularity'])
            ? $data['popularity']
            : null
        );

        return $entity;
    }

}