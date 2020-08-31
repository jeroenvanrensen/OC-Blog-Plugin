<?php 

namespace JeroenvanRensen\Blog\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

class Posts extends Controller
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
     * Configuration file for the `FormController` behavior
     * 
     * @var string
     */
    public $formConfig = 'config_form.yaml';
    
    public $requiredPermissions = ['JeroenvanRensen.config_permission', 'JeroenvanRensen.config_other_posts'];

      public function listExtendQuery($query)
    {
        if (!$this->user->hasAnyAccess(['JeroenvanRensen.config_other_posts'])) {
            $query->where('user_id', $this->user->id);
        }
    }

    public function formExtendQuery($query)
    {
        if (!$this->user->hasAnyAccess(['JeroenvanRensen.config_other_posts'])) {
            $query->where('user_id', $this->user->id);
        }
    } 
    
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
