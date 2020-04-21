<?php
class View
{

    private $pageVars = array();
    private $template;
    public $smarty;

    public function __construct($template, $isbackend = false)
    {
        $this->template = $template . '_layout.tpl';

        require APP_DIR . 'libs/Smarty.class.php';
        $this->smarty = new Smarty;
        if ($isbackend) {
            $this->smarty->caching = false;
            $this->smarty->debugging = DEBUGGING_BACK;
            $this->smarty->setTemplateDir(APP_DIR . 'views/backend/templates');
            $this->smarty->setCompileDir(APP_DIR.'views/backend/compile');
            $this->smarty->setCacheDir(APP_DIR . 'views/backend/cache');
            $this->smarty->assign('BASE_COMPONENT', BASE_URL . 'application/views/backend/templates/component/');
        } else {
            $this->smarty->debugging = DEBUGGING;
            $this->smarty->caching = CACHING;
            $this->smarty->cache_lifetime = CACHE_LIFETIME;
            $this->smarty->setTemplateDir(APP_DIR . 'views/frontend/templates/' . THEME);
            $this->smarty->setCompileDir(APP_DIR.'views/frontend/compile/'.THEME);
            $this->smarty->setCacheDir(APP_DIR . 'views/frontend/cache/' . THEME);
            $this->smarty->assign('BASE_COMPONENT', BASE_URL . 'application/views/frontend/templates/' . THEME . '/component/');
        }

        // $this->smarty->setCompileDir('/dev/null');

        $this->smarty->setConfigDir(APP_DIR . 'config');
        $this->smarty->setCompileCheck(COMPILECHECK);
        $this->smarty->assign('BASE_URL', BASE_URL);

        $this->smarty->setPluginsDir(array(
            APP_DIR . 'plugins',
            APP_DIR . 'libs/plugins',
        ));

        if ($this->smarty->isCached($this->template, md5($this->full_path())) && CACHING) {
            $this->smarty->clearAllCache(REMOVE_CAHE_OLD_SECONDS);
            $this->render();
            exit();
        }

    }

    public function full_path()
    {
        $s = &$_SERVER;
        $ssl = (!empty($s['HTTPS']) && $s['HTTPS'] == 'on') ? true : false;
        $sp = strtolower($s['SERVER_PROTOCOL']);
        $protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');
        $port = $s['SERVER_PORT'];
        $port = ((!$ssl && $port == '80') || ($ssl && $port == '443')) ? '' : ':' . $port;
        $host = isset($s['HTTP_X_FORWARDED_HOST']) ? $s['HTTP_X_FORWARDED_HOST'] : (isset($s['HTTP_HOST']) ? $s['HTTP_HOST'] : null);
        $host = isset($host) ? $host : $s['SERVER_NAME'] . $port;
        $uri = $protocol . '://' . $host . $s['REQUEST_URI'];
        $segments = explode('?', $uri, 2);
        $url = $segments[0];
        return $url;
    }

    public function set($var, $val)
    {
        $this->smarty->assign($var, $val);
    }

    public function render()
    {
        $this->smarty->display($this->template, md5($this->full_path()));
    }

}
