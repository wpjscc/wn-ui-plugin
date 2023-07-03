<?php namespace Wpjscc\Ui\Controllers;

use BackendMenu;
//use Backend\Classes\Controller;
use Wpjscc\Api\Classes\Controller;
use Wpjscc\Api\Classes\ApiController;
use Wpjscc\Ui\Models\Config;
/**
 * Configs Backend Controller
 */
class ConfigsApi extends Controller
{
     //黑名单
    protected $guarded = [
        // 'update',
        'onDelete'
    ];

    protected $publicActions = ['index'];
    /**
     * @var array Behaviors that are implemented by this controller.
     */
    public $implement = [
        \Wpjscc\Api\Behaviors\FormController::class,
        \Wpjscc\Api\Behaviors\ListController::class,
    ];

    public function index()
    {
        $ui = ApiController::$ui;
        if ($ui) {
            $config = Config::getConfigByCode($ui);
        }

        if (empty($config)) {
            $config = Config::getDefaultConfig();
        }

        return [
            'plugins' =>  $config
        ];
        // return 
        return  [
            'plugins' => [
                [
                    'api' => 'wpjscc/swiper/swipersapi',
                    'type' => 'winter-swiper'
                ],
                [
                    'api' => 'wpjscc/api/testsapi',
                    'type' => 'winter-index'
                ],
                [
                    'type' => 'winter-nav',
                    'is_fixed' => true,
                    'left_options' => [
                        [
                            'icon' => 'home',
                            'text' => '首页',
                            'type' => 'route',
                            'route' => [
                                'type' => 'switchTab',
                                'url' => 'pages/tabbar/index',
                                'params' => [
                                    'ui' => 'abcdef'
                                ],
                            ]
                        ],
                        // [
                        //     'icon' => 'chat',
                        //     'text' => '客服',
                        // ],
                        // [
                        //     "icon" => "shop",
                        //     "text" => "店铺",
                        //     "info" => 3,
                        //     "infoBackgroundColor" => "#007aff",
                        //     "infoColor" => "#f5f5f5",
                        // ],
                        // [
                        //     "icon" => "cart",
                        //     "text" => "购物车",
                        //     "info" => 7,
                        //     "type" => "popup_list",
                        //     "popup_list" => [
                        //         "popup_list_api" => "wpjscc/api/testcartsapi",
                        //     ]
                        // ],
                        [
                            "icon" => "person",
                            "text" => "我的",
                            "type" => "route",
                            "route" =>  [
                                "type" => "switchTab",
                                "url" => "pages/tabbar/my",
                                "params" => [
                                    "ui" => "abcdef"
                                ]
                            ]
                        ]
                    ],
                    'right_options' => [

                    ],
                ],
            ]
        ];
    }


    //自定义处理器
    public function index_onTest()
    {
        $this->putUserPreference('abc', 'def');
        $this->putUserPreference('a', 'b');
        $this->putUserPreference('c', 'd');
        $this->clearUserPreference('abc');
        
        return $this->success([
            'ajax' => 'true',
            'a' => $this->getUserPreference('a'),
            'c' => $this->getUserPreference('c'),
            'abc' => $this->getUserPreference('abc'),
            'getUserPreferences' => $this->getUserPreferences()
        ]);
    }

}
