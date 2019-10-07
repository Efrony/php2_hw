<?php
use app\engine\Request;
use app\model\repositories\CartRepository;
use app\model\repositories\CommentsRepository;
use app\model\repositories\OrdersRepository;
use app\model\repositories\ProductRepository;
use app\model\repositories\UsersRepository;
use app\engine\Db;

return [
    'ROOT_DIR' =>$_SERVER['DOCUMENT_ROOT'] . '/../',
    'CONTROLLER_NAMESPACE'=> 'app\\controllers\\',
    'TEMPLATES_DIR'=> '../templates/',
    'LAYOUTS_DIR'=> "./layouts/",
    'DIR_CATALOG'=> './img/catalog/',
    //'root_dir' => __DIR__ . "/../",
    //'templates_dir' => __DIR__ . "/../views/",
    //'controllers_namespaces' => 'app\controllers\\',
    'components' => [
        'db' => [
            'class' => Db::class,
            'driver' => 'mysql',
            'host' => 'localhost',
            'login' => 'root',
            'password' => '',
            'database' => 'shop',
            'charset' => 'utf8'
        ],
        'request' => [
            'class' => Request::class
        ],

        // на будущее попробовать без reflection !!
        'cartRepository' => [
            'class' => CartRepository::class
        ],
        'commentsRepository' => [
            'class' => CommentsRepository::class
        ],
        'ordersRepository' => [
            'class' => OrdersRepository::class
        ],
        'productRepository' => [
            'class' => ProductRepository::class
        ],
        'usersRepository' => [
            'class' => UsersRepository::class
        ]

    ]
];