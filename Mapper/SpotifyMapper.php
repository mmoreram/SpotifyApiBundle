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
use Mmoreram\SpotifyApiBundle\Entity\SpotifyImage;
use Mmoreram\SpotifyApiBundle\Entity\SpotifyEntityBase;

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
    public function map(array $data)
    {
        switch ($data['type']) {

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
    public function mapArtistsData(array $data)
    {
        $result = null;

        if (isset($data['artists'])) {

            $result = $this->mapArtists($data['artists']);
        } elseif (isset($data['artist'])) {

            $result = $this->mapArtist($data['artist']);
        } else {

            $result = $this->mapArtist($data);
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
    public function mapAlbumsData(array $data)
    {
        $result = null;

        if (isset($data['albums'])) {

            $result = $this->mapAlbums($data['albums']);
        } elseif (isset($data['album'])) {

            $result = $this->mapAlbum($data['album']);
        } else {

            $result = $this->mapAlbum($data);
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
    public function mapTracksData(array $data)
    {
        $result = null;

        if (isset($data['tracks'])) {

            $result = $this->mapTracks($data['tracks']);
        } elseif (isset($data['track'])) {

            $result = $this->mapTrack($data['track']);
        } else {

            $result = $this->mapTrack($data);
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
    public function mapArtists(array $artists)
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
    public function mapArtist(array $artist)
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
    public function mapAlbums(array $albums)
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
    public function mapAlbum(array $album, $recursive = true)
    {
        $albumEntity = new SpotifyAlbum();
        $albumEntity = $this->mapCommon($albumEntity, $album);

        $albumEntity
            ->setAvailableMarkets(
                isset($album['available_markets'])
                ? $album['available_markets']
                : null
            )
            ->setArtist(
                $recursive && isset($album['artists'])
                ? current($this->mapArtists($album['artists']))
                : null
            )
            ->setImages(
                $recursive && isset($album['images'])
                ? $this->mapImages($album['images'])
                : null
            )
        ;

        return $albumEntity;
    }

    /**
     * Map tracks given a parsed tracks data
     *
     * @param array $tracks Crude tracks data
     *
     * @return array Entities mapped
     */
    public function mapTracks(array $tracks)
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
    public function mapTrack(array $track)
    {
        $trackEntity = new SpotifyTrack();
        $trackEntity = $this->mapCommon($trackEntity, $track);

        $trackEntity
            ->setAvailableMarkets(
                isset($track['available_markets'])
                ? $track['available_markets']
                : null
            )
            ->setTrackNumber(
                isset($track['track_number'])
                ? $track['track_number']
                : null
            )
            ->setDuration(
                isset($track['duration_ms'])
                ? $track['duration_ms']
                : null
            )
            ->setArtists(
                isset($track['artists'])
                ? $this->mapArtists($track['artists'])
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
     * Map images given a parsed images data
     *
     * @param array $images Crude images data
     *
     * @return array Entities mapped
     */
    public function mapImages(array $images)
    {
        $imagesLoaded = array();

        foreach ($images as $image) {

            $imagesLoaded[] = $this->mapImage($image);
        }

        return $imagesLoaded;
    }

    /**
     * Map image given a parsed image data
     *
     * @param array $image Crude image data
     *
     * @return SpotifyImage Image loaded
     */
    public function mapImage(array $image)
    {
        $imageEntity = new SpotifyImage();

        $imageEntity
            ->setURL(
                isset($image['url'])
                ? $image['url']
                : null
            )
            ->setWidth(
                isset($image['width'])
                ? $image['width']
                : null
            )
            ->setHeight(
                isset($image['height'])
                ? $image['height']
                : null
            )
        ;

        return $imageEntity;
    }

    /**
     * Given an entity and crude data, fill some common fields
     *
     * @param SpotifyEntityBase $entity Entity
     * @param array             $data   Crude data
     *
     * @return SpotifyEntityBase Object with data mapped
     */
    public function mapCommon(SpotifyEntityBase $entity, array $data)
    {
        $entity
            ->setHref(
                isset($data['href'])
                ? $data['href']
                : null
            )
            ->setUri(
                isset($data['uri'])
                ? $data['uri']
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
            )
        ;

        return $entity;
    }

}
