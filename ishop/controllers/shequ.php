<?php
class shequ extends IController
{
    public $layout = 'site';

    function init()
    {
        CheckRights::checkUserRights();
    }
    function index()
    {
        $siteConfigObj = new Config("site_config");
        $site_config   = $siteConfigObj->getInfo();
        $index_slide = isset($site_config['index_slide'])? unserialize($site_config['index_slide']) :array();
        $this->index_slide = $index_slide;
        $this->redirect('index');
    }

}