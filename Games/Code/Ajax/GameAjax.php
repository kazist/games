<?php

/**
 * @copyright  Copyright (C) 2012 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Games\Games\Ajax;

defined('KAZIST') or exit('Not Kazist Framework');

use Games\Games\Models\GameModel;
use Kazist\KazistFactory;

/**
 * Dashboard Controller class for the Application
 *
 * @since  1.0
 */
class GameAjax {

    /**
     * Save functions
     *
     * @return  void
     *
     * @since   1.0
     * @throws  \RuntimeException
     */
    public function ajaxloadgames() {

        $gameModel = new GameModel();
        echo $gameModel->loadGames();
        exit;
    }

}
