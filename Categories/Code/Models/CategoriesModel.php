<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Games\CategoryCode\Models;

defined('KAZIST') or exit('Not Kazist Framework');

use Kazist\Model\ BaseModel;
use Kazist\KazistFactory;
use Kazist\Service\Database\Query;

/**
 * Description of MarketplaceModel
 *
 * @author sbc
 */
class CategoriesModel extends BaseModel {

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
        $item_obj->media = $factory->getMedia($item->icon);
        $item_obj->total_games = $this->getCountCategoryGames($item->id);
        $item_obj->games = $this->getCategoryGames($item->id);


        return $item_obj;
    }

    public function getCategoryGames($category_id) {

        $factory = new KazistFactory();


        $query = new Query();
        $query->select('*');
        $query->from('#__games_games', 'gg');
        $query->where('gg.category_id=:category_id');
        $query->setParameter('category_id', $category_id);

        $query->setFirstResult(0);
        $query->setMaxResults(4);

        $records = $query->loadObjectList();

        if (!empty($records)) {
            foreach ($records as $key => $record) {
                $records[$key]->media = $factory->getMedia($record->image);
            }
        }

        return $records;
    }

    public function getCountCategoryGames($category_id) {

        $factory = new KazistFactory();


        $query = new Query();
        $query->select('COUNT(*) AS total');
        $query->from('#__games_games', 'gg');
        $query->where('gg.category_id=:category_id');
        $query->setParameter('category_id', $category_id);



        $record = $query->loadObject();

        return $record->total;
    }

}
