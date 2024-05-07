<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/admin' => [[['_route' => 'app_back', '_controller' => 'App\\Controller\\BackController::index'], null, null, null, false, false, null]],
        '/Evenement' => [[['_route' => 'app_front_Evenement', '_controller' => 'App\\Controller\\EvenementController::indexFront'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'app_front', '_controller' => 'App\\Controller\\FrontController::index'], null, null, null, false, false, null]],
        '/admin/Participation' => [[['_route' => 'app_back_Participation', '_controller' => 'App\\Controller\\ParticipationController::index'], null, null, null, false, false, null]],
        '/admin/Participation/add' => [[['_route' => 'app_back_Participation_add', '_controller' => 'App\\Controller\\ParticipationController::add'], null, null, null, false, false, null]],
        '/admin/Evenement' => [[['_route' => 'app_back_Evenement', '_controller' => 'App\\Controller\\RatingSystemController::index'], null, null, null, false, false, null]],
        '/admin/Evenement/add' => [[['_route' => 'app_back_Evenement_add', '_controller' => 'App\\Controller\\RatingSystemController::add'], null, null, null, false, false, null]],
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/Evenement/Rate/([^/]++)(*:31)'
                .'|/admin/(?'
                    .'|Participation/(?'
                        .'|update/([^/]++)(*:80)'
                        .'|delete/([^/]++)(*:102)'
                        .'|sendSms/([^/]++)(*:126)'
                    .')'
                    .'|Evenement/(?'
                        .'|update/([^/]++)(*:163)'
                        .'|delete/([^/]++)(*:186)'
                    .')'
                .')'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:227)'
                    .'|wdt/([^/]++)(*:247)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:293)'
                            .'|router(*:307)'
                            .'|exception(?'
                                .'|(*:327)'
                                .'|\\.css(*:340)'
                            .')'
                        .')'
                        .'|(*:350)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        31 => [[['_route' => 'app_front_Evenement_Rating', '_controller' => 'App\\Controller\\EvenementController::indexFrontRate'], ['id'], null, null, false, true, null]],
        80 => [[['_route' => 'app_back_Participation_update', '_controller' => 'App\\Controller\\ParticipationController::update'], ['id'], null, null, false, true, null]],
        102 => [[['_route' => 'app_back_Participation_delete', '_controller' => 'App\\Controller\\ParticipationController::delete'], ['id'], null, null, false, true, null]],
        126 => [[['_route' => 'app_back_reservation_sendSms', '_controller' => 'App\\Controller\\ParticipationController::sendSMS'], ['id'], null, null, false, true, null]],
        163 => [[['_route' => 'app_back_Evenement_update', '_controller' => 'App\\Controller\\RatingSystemController::update'], ['id'], null, null, false, true, null]],
        186 => [[['_route' => 'app_back_Evenement_delete', '_controller' => 'App\\Controller\\RatingSystemController::delete'], ['id'], null, null, false, true, null]],
        227 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        247 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        293 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        307 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        327 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        340 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        350 => [
            [['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
