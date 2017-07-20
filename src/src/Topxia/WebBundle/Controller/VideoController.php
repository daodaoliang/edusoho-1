<?php

namespace Topxia\WebBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class VideoController extends BaseController
{
    public function indexAction(Request $request)
    {
        $site = $this->getSettingService()->get('site', array());
        $parameter = array();
        $template = "@video/{$site['dianbo']}.html.twig";

        if($site['dianbo'] == 'polyv')
        {
            $parameter['userid'] = "96d6bd224c";
            $parameter['ts'] = time() * 1000;
            $parameter['writeToken'] = "b138e2fd-be4c-4ffd-9842-63d41456ae59";
            $parameter['readToken'] = "66e83b7d-e769-4e0f-992b-a4a85439d748";
            $parameter['plain'] = $parameter['ts'] . $parameter['writeToken'];
            $parameter['hash'] = md5($parameter['plain']);
            $parameter['secretkey'] = "8DUCySs9iH";
            $parameter['sign'] = md5($parameter['secretkey'] . $parameter['ts']);
        }else{

        }

        return $this->render($template, array('parameter' => $parameter));
    }

    protected function getSettingService()
    {
        return $this->getServiceKernel()->createService('System.SettingService');
    }
}
