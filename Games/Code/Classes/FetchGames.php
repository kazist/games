<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Games\Games\Code\Classes;

defined('KAZIST') or exit('Not Kazist Framework');

use Kazist\KazistFactory;
use Kazist\Service\Media\UploadMedia;
use Kazist\Service\Database\Query;
use Kazist\Service\Media\MediaManager;

/**
 * Description of MarketplaceModel
 *
 * @author sbc
 */
class FetchGames {

    public function fetchOnlineGames() {

        $factory = new KazistFactory();

        $tmpobject = new \stdClass();
        $feeds = $this->getFeeds();

        if (!empty($feeds)) {
            foreach ($feeds as $key => $feed) {

                $json_object = json_decode(file_get_contents($feed->feed_url . '&limit=' . $feed->limit), true);
                $this->processFeed($json_object, $feed->category_id);

                $tmpobject->id = $feed->id;
                $tmpobject->is_processed = 1;

                $factory->saveRecord('#__games_feeds', $tmpobject);
            }
        } else {
            $query = new Query();
            $query->update('#__games_feeds');
            $query->set('is_processed', 0);
            $query->execute();
        }
    }

    public function processFeed($games, $category_id) {

        $uploadmedia = new UploadMedia();
        $factory = new KazistFactory();

        if (!empty($games)) {
            foreach ($games as $game) {

                $game['tags'] = implode(',', $game['tags']);
                $game['fog_id'] = $game['id'];
                $game['date_added'] = $game['created'];
                $game['category_id'] = $category_id;
                $game['published'] = 1;

                unset($game['id']);
                unset($game['updated']);
                unset($game['created']);
                unset($game['category']);

                if (!$this->checkIfGameExist($game['fog_id'])) {

                    $file_type = $this->getMediaExtension($game['swf_file']);

                    if ($file_type == 'swf') {

                        $game['file_type'] = $file_type;

                        $game['small_thumbnail_url'] = $this->saveImage($category_id, $game['fog_id'], $game['small_thumbnail_url']);
                        $game['med_thumbnail_url'] = $this->saveImage($category_id, $game['fog_id'], $game['med_thumbnail_url']);
                        $game['large_thumbnail_url'] = $this->saveImage($category_id, $game['fog_id'], $game['large_thumbnail_url']);
                        $game['image'] = $game['med_thumbnail_url'];
                        $game['swf_file'] = $this->saveImage($category_id, $game['fog_id'], $game['swf_file']);

                        $factory->saveRecord('#__games_games', $game);
                    }
                }
            }
        }
    }

    public function saveImage($category_id, $fog_id, $file) {

        $factory = new KazistFactory();
        $uploadmedia = new UploadMedia();
        $mediamanager = new MediaManager();

        $file_dir = JPATH_ROOT . '/uploads/games/games/' . $category_id . '/' . $fog_id . '/';
        $web_dir = 'uploads/games/games/' . $category_id . '/' . $fog_id . '/';

        $factory->makeDir($file_dir);

        $file_img_name = $this->getImageName($file);
        $file_url_web = $web_dir . $file_img_name;
        $file_url = $file_dir . $file_img_name;
        
        if ($this->checkUrlExist($file)) {

            file_put_contents($file_url, file_get_contents($file));
            return $mediamanager->updateMedia($this->media_id, 'games/games', 'image', $file_img_name, $file_url_web);
        } else {
            return false;
        }
    }

    public function getFeeds() {

        $factory = new KazistFactory();


        $query = new Query();
        $query->select('gf.*');
        $query->from('#__games_feeds', 'gf');
        $query->where('gf.is_processed=:is_processed OR gf.is_processed IS NULL');
        $query->setParameter('is_processed', 0);
        $query->setFirstResult(0);
        $query->setMaxResults(10);

        $records = $query->loadObjectList();

        return $records;
    }

    public function checkUrlExist($url) {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_NOBODY, true);
        $result = curl_exec($curl);
        if ($result !== false) {
            $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            if ($statusCode == 404) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    public function checkIfGameExist($fog_id) {

        $factory = new KazistFactory();


        $query = new Query();
        $query->select('gg.*');
        $query->from('#__games_games', 'gg');
        $query->where('gg.fog_id=:fog_id');
        $query->setParameter('fog_id', $fog_id);

        $record = $query->loadObject();

        if (is_object($record)) {
            return $record->id;
        } else {
            return false;
        }
    }

    public function getImageName($file) {

        $file = array_reverse(explode('/', $file));
        $file = explode('?', $file[0]);

        $file_name = $file[0];

        return $file_name;
    }

    public function getMediaExtension($file) {

        $file = array_reverse(explode('.', $file));
        $file_type = explode('?', $file[0]);

        $extension = $file_type[0];

        return $extension;
    }

}
