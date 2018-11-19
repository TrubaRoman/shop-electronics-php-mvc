<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AssetsBondle
 *
 * @author r_truba
 */
class AssetsBondle
{
    private $assets;

    public function __construct()
    {
        $Patch = ROOT.'/config/assets.php';
        $this->assets = require($Patch);

                
        //print_r($assets);
    }
    
    public function getAssetUri()
    {
        foreach ($this->assets as $uriPatch => $link) {

            $uri = $this->getURI();

            if (preg_match("~$uriPatch~", $uri)) {
//                var_dump($uri);die;
                return $link;
            }
        }
    }

    private function getURI()
    {
                 if(!empty($_SERVER['REQUEST_URI']))
        {
            return trim($_SERVER['REQUEST_URI'],'/');
        }
    }
    

}
