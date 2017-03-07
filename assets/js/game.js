/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


jQuery(document).ready(function () {
    game.init();
});

game = function () {
    return {
        init: function () {

            game.addEvents(jQuery('body'));

        }, addEvents: function (html) {


            html.find(".games-navigation a").on('click', function (event) {
                game.loadGames(jQuery(this));
                return false;
            });

            return html;

        }, loadGames: function (this_element) {

            var category_id = this_element.attr('category_id');
            var action = this_element.attr('action');
            var offset = this_element.attr('offset');
            var limit = this_element.attr('limit');

            var data_object = {category_id: category_id, action: action, offset: offset, limit: limit};

            console.log(data_object);

            var form = kazist.callAjaxByRoute('games.games.ajaxloadgames', data_object, true);

            jQuery('.game-games-listing').html(form);

            game.addEvents(jQuery('.game-games-listing'));
        }

    };
}();