<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    'app_back' => [[], ['_controller' => 'App\\Controller\\BackController::index'], [], [['text', '/admin']], [], [], []],
    'app_front_Evenement' => [[], ['_controller' => 'App\\Controller\\EvenementController::indexFront'], [], [['text', '/Evenement']], [], [], []],
    'app_front_Evenement_Rating' => [['id'], ['_controller' => 'App\\Controller\\EvenementController::indexFrontRate'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/Evenement/Rate']], [], [], []],
    'app_front' => [[], ['_controller' => 'App\\Controller\\FrontController::index'], [], [['text', '/']], [], [], []],
    'app_back_Participation' => [[], ['_controller' => 'App\\Controller\\ParticipationController::index'], [], [['text', '/admin/Participation']], [], [], []],
    'app_back_Participation_add' => [[], ['_controller' => 'App\\Controller\\ParticipationController::add'], [], [['text', '/admin/Participation/add']], [], [], []],
    'app_back_Participation_update' => [['id'], ['_controller' => 'App\\Controller\\ParticipationController::update'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/admin/Participation/update']], [], [], []],
    'app_back_Participation_delete' => [['id'], ['_controller' => 'App\\Controller\\ParticipationController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/admin/Participation/delete']], [], [], []],
    'app_back_reservation_sendSms' => [['id'], ['_controller' => 'App\\Controller\\ParticipationController::sendSMS'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/admin/Participation/sendSms']], [], [], []],
    'app_back_Evenement' => [[], ['_controller' => 'App\\Controller\\RatingSystemController::index'], [], [['text', '/admin/Evenement']], [], [], []],
    'app_back_Evenement_add' => [[], ['_controller' => 'App\\Controller\\RatingSystemController::add'], [], [['text', '/admin/Evenement/add']], [], [], []],
    'app_back_Evenement_update' => [['id'], ['_controller' => 'App\\Controller\\RatingSystemController::update'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/admin/Evenement/update']], [], [], []],
    'app_back_Evenement_delete' => [['id'], ['_controller' => 'App\\Controller\\RatingSystemController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/admin/Evenement/delete']], [], [], []],
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], [], []],
    '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_wdt']], [], [], []],
    '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], [], []],
    '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], [], []],
    '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], [], []],
    '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], [], []],
    '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], [], []],
    '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::body'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::stylesheet'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
];
