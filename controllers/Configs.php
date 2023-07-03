<?php namespace Wpjscc\Ui\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Configs Backend Controller
 */
class Configs extends Controller
{
    /**
     * @var array Behaviors that are implemented by this controller.
     */
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
    ];

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Wpjscc.Ui', 'ui', 'configs');
    }
}
