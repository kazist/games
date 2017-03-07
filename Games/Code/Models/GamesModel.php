<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Games\Games\Code\Models;

defined('KAZIST') or exit('Not Kazist Framework');

use Kazist\Model\BaseModel;
use Kazist\KazistFactory;
use Games\Games\Code\Classes\FetchGames;
use Kazist\Service\Database\Query;

/**
 * Description of MarketplaceModel
 *
 * @author sbc
 */
class GamesModel extends BaseModel {

    public function saveGamePlayer() {

        $factory = new KazistFactory();
        $record = $this->getRecord();
        $user = $factory->getUser();

        $data = new \stdClass();
        $data->game_id = $record->id;
        $data->user_id = $user->id;
        $where_obj = clone $data;

        $player = $this->getQueryedRecord('#__games_games_players', 'ggp', array('game_id=:game_id', 'user_id=:user_id'), $where_obj);
        $data->hit = $player->hit + 1;

        $this->saveRecord('#__games_games_players', $data, array('game_id=:game_id', 'user_id=:user_id'), $where_obj);
    }

    public function saveGame($form) {

        $factory = new KazistFactory();
        $form['image'] = $form['image_default'];

        $id = $factory->saveRecord('#__games_games', $form);

        if ($id) {
            $msg = 'Business Save Successfully.';

            $factory->enqueueMessage($msg, 'info');
            $redirect = $this->generateUrl('games.games.detail', array('id' => $id));

            $this->saveTestimonialPhotos($id);
        } else {

            $msg = 'Saving Business Failed.';
            $factory->enqueueMessage($msg, 'info');
            $redirect = $this->generateUrl('games.games.edit');
        }

        return $redirect;
    }

    public function getGames($offset = 0, $limit = 3) {

        $factory = new KazistFactory();

        $session = $factory->getSession();

        //$email->debug_exit = true;
        $uri = $session->get('uri');

        $query = new Query();
        $query->select('gg.*');
        $query->from('#__games_games', 'gg');

        $query->orderBy('id ', 'DESC');
        $query->setFirstResult($offset);
        $query->setMaxResults($limit);

        $records = $query->loadObjectList();

        return $this->getAdditionalDetail($records);
    }

    public function getTotalGames() {



        $query = new Query();
        $query->select('COUNT(*) AS total');
        $query->from('#__games_games', 'gg');


        $record = $query->loadObject();

        return $record->total;
    }

    //put your code here
    public function getAdditionalDetail($items) {

        $tmp_array = array();

        if (!empty($items)) {
            foreach ($items as $item) {
                $tmp_array[] = $this->getItemAdditionDetails($item);
            }
        }

        return $tmp_array;
    }

    public function getItemAdditionDetails($item) {
        $factory = new KazistFactory();

        $item_obj = (is_object($item)) ? $item : new \stdClass();

        $item_obj->title = ucwords($item->title);
        $item_obj->media = $factory->getMedia($item->med_thumbnail_url);
        $item_obj->swf_file = $factory->getMedia($item->swf_file);
        $item_obj->category = $this->getCategory($item->category_id);

        return $item_obj;
    }

    public function getCategory($category_id) {

        $factory = new KazistFactory();

        $session = $factory->getSession();

        //$email->debug_exit = true;
        $uri = $session->get('uri');

        $query = new Query();
        $query->select('gc.*');
        $query->from('#__games_categories', 'gc');
        $query->where('gc.id=:category_id');
        $query->where('category_id', $category_id);


        $record = $query->loadObject();

        return $record;
    }

    public function fetchOnlineGames() {
        $fetchgame = new FetchGames();
        $fetchgame->fetchOnlineGames();
    }

    public function loadGames() {
        $paths = array();

        $object_arr = new \stdClass();
        $factory = new KazistFactory();


        $offset = $this->request->request->get('offset');
        $category_id = $this->request->request->get('category_id');
        $action = $this->request->request->get('action');
        $limit = $this->request->request->get('limit');

        $object_arr->category_id = $category_id;
        $object_arr->action = $action;
        $object_arr->limit = $limit;
        $object_arr->offset = ($action == 'previous') ? $offset - $limit : $offset + $limit;

        $template = 'game.list.twig';
        $this->twig_paths[] = realpath(JPATH_ROOT . '/applications/Games/generalviews');
        $html = $factory->renderData($object_arr, $template, $paths);


        return $html;
    }

}
