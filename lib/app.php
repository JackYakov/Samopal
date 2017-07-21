<?php

require_once 'action/iaction.php';
require_once 'action/users.php';

  class Application {

    private $_router;

    public function __construct(Router $router) {
        $this->setRouter($router);
    }

    public function setRouter(Router $router) {
        $this->_router = $router;
    }

    public function run()
    {
        $actionName = $this->_router->getActionName();
        $action = new $actionName;
        session_start();
        if (($actionName !== 'ActionArticle' and $actionName !== 'ActionRegistration') or Users::setSession()){
            if ($action instanceof IAction) {
                $action->run();
                echo $action->getHtml();


            }
        }else echo 'Для не зарегестрированных доступ закрыт ';
    }
}