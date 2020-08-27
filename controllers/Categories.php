<?php 

namespace JeroenvanRensen\Blog\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Categories extends Controller
{
    /**
     * Behaviors that are implemented by this controller.
     * 
     * @var array
     */
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    /**
     * Configuration file for the `FormController` behavior.
     * 
     * @var string
     */
    public $formConfig = 'config_form.yaml';

    /**
     * Configuration file for the `ListController` behavior.
     * 
     * @var string
     */
    public $listConfig = 'config_list.yaml';

    /**
     * Set the backend menu
     *
     * @return  null
     */
    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('JeroenvanRensen.Blog', 'blog');
    }
}
