<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Games\Addons\Gameslider\Models;

use Kazist\KazistFactory;
use Kazist\Service\Database\Query;

class GamesliderModel {

    public function getInfo() {
        return 'Hello World!';
    }

    public function getLatestGames() {

        $query = $this->getQuery();

        $query->setFirstResult(0);
        $query->setMaxResults(5);

        $records = $query->loadObjectList();

        return $records;
    }

    public function getQuery() {

        $factory = new KazistFactory();

        $query = $factory->getQueryBuilder('#__games_games', 'gg');

        $query->where('gg.image>0');
        $query->orderBy('gg.date_created ', 'DESC');

        return $query;
    }

}
