<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Games\Games\Players\Code\Models;

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
class PlayersModel extends BaseModel {

    public function appendSearchQuery($query) {
        $query->orderBy('ggp.hit', 'DESC');
    }

}
