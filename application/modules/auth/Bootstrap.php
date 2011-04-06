<?php
/**
 * Auth Bootstrap
 *
 * @author          Eddie Jaoude
 * @package       Auth Module
 *
 */
class Auth_Bootstrap extends Zend_Application_Module_Bootstrap {

    /**
     * Auto load default module classes
     *
     * @author          Eddie Jaoude
     * @param           void
     * @return           object $moduleLoader
     *
     */
    protected function _initAutoload() {
        $moduleLoader = new Zend_Application_Module_Autoloader(array(
                    'namespace' => 'Auth_',
                    'basePath' => APPLICATION_PATH . '/modules/auth'));
        return $moduleLoader;
    }

    /**
     * Load BaseController
     *
     * @author          Eddie Jaoude
     * @param           void
     * @return           void
     *
     */
    protected function _initBaseController() {
        # base controller - can this be moved and autoloaded?
        include_once('controllers/AuthBaseController.php');
    }

    /**
     * Configuration
     *
     * @author          Eddie Jaoude
     * @param           void
     * @return          void
     *
     */
    protected function _initConfig() {
        # get config
        $this->_configAuth = new Zend_Config_Ini( dirname(__FILE__) .
                DIRECTORY_SEPARATOR . 'configs' .
                DIRECTORY_SEPARATOR . 'auth.ini', APPLICATION_ENV);

        # get registery
        $this->_registry = Zend_Registry::getInstance();

        # save config to registry
        $this->_registry->auth = new stdClass();
        $this->_registry->auth = $this->_configAuth->auth;
    }

}

