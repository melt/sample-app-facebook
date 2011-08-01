<?php namespace melt;

/** Application specific controller. */
abstract class AppController extends Controller {
    // The layout your controllers use by default.
    public $layout = "/views/layout";

    /**
     * This function is executed before any action in the controller.
     * It's a handy place to check for an active session or
     * inspect user permissions.
     * @param string $action_name Action name about to be called.
     * @param array $arguments Arguments that will be passed to action.
     * @return void
     */
    public function beforeFilter($action_name, $arguments) {}

    /**
     * Called after controller action logic, but before the view is rendered.
     * @param string $action_name Action name that was called.
     * @param array $arguments Arguments that was passed to action.
     * @return void
     */
    public function beforeRender($action_name, $arguments) {}

    /**
     * Called after every controller action, and after rendering is complete.
     * This is the last controller method to run.
     * @param string $action_name Action name that was called.
     * @param array $arguments Arguments that was passed to action.
     * @return void
     */
    public function afterRender($action_name, $arguments) {}
    
    /**
     * Handles URL rewriting and routes to desired controllers.
     * @param array $path_tokens Path entered in the URL.
     * @return array $path_tokens Path to rewrite to.
     */
    public static function rewriteRequest($path_tokens) {
        if($path_tokens[0]==""){
            return array("pages","");
        } elseif (method_exists("melt\PagesController", $path_tokens[0])){
            array_unshift($path_tokens,"pages");
            return $path_tokens;
        } elseif($path_tokens[0]=="pages"){
            return false;
        }
    }
}
