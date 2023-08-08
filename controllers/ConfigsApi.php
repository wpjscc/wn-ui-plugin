<?php namespace Wpjscc\Ui\Controllers;

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

        $actions = $config['actions'] ?? new \stdClass;
        unset($config['actions']);

        return [
            'plugins' =>  $config,
            'actions' => $actions
        ];
    }

    public function index_onDelete()
    {

    }

    public function create($context = null)
    {

    }

    public function create_onSave($context = null)
    {

    }

    public function create_onRelationRender()
    {
       
    }

    public function update($recordId = null, $context = null)
    {

    }

    public function update_onSave($recordId = null, $context = null)
    {

    }

    public function update_onDelete($recordId = null)
    {

    }

    public function update_onRelationRender($recordId = null)
    {
      
    }

    public function preview($recordId = null, $context = null)
    {

    }

    public function preview_onSave($recordId = null, $context = null)
    {

    }

    public function preview_onRelationRender($recordId = null)
    {
        
    }


    

}
