<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Games\Addons\Gameslider\Controllers;

use Kazist\Controller\AddonController;
use Games\Addons\Gameslider\Models\GamesliderModel;

/**
 * Kazist view class for the application
 *
 * @since  1.0
 */
class GamesliderController extends AddonController {

    function indexAction($offset = 0, $limit = 6) {

        $slider_limit = 6;

        $model = new GamesliderModel;

        $games = $model->getLatestGames();

        $data_arr['games'] = $games;
        $data_arr['slider_limit'] = $slider_limit;

        $this->html = $this->render('Games:Addons:Gameslider:views:gameslider.twig', $data_arr);

        $response = $this->response($this->html);



        return $response;
    }

}
