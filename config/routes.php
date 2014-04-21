<?php
return [
    'default' => '/topic/list',
    'errors' => '/error/:code',
    'routes' => [
        '/topic(/:action(/:id))' => [
            'controller' => '\Suggestotron\Controller\Topics',
            'action' => 'list',
        ],
        '/vote(/:action(/:id))' => [
                'controller' => '\Suggestotron\Controller\Votes',
        ],
        '/:controller(/:action)' => [
            'controller' => '\Suggestotron\Controller\:controller',
            'action' => 'index',
        ]
    ]
];