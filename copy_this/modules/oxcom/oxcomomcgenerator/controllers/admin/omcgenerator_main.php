<?php


class omcgenerator_main extends oxAdminView
{
    /**
     * Current class template name.
     * @var string
     */
    protected $_sThisTemplate = 'omcgenerator_main.tpl';

    protected $_aGeneratedFiles = array();

    public function generateJsonFiles(){
        $aArticles = $this->_getArticles();
        if($aArticles && count($aArticles) > 0){
            foreach($aArticles as $oArticle){
                $this->_createJsonFile($oArticle);
            }
        }

        $this->_aViewData['aGeneratedFiles'] = $this->_aGeneratedFiles;
    }

    protected function _getArticles(){
        $oConfig = oxRegistry::getConfig();
        $sView = getViewName('oxarticles');
        $sSelect = "Select * from $sView where oxparentid = ''";
        if($oConfig->getRequestParameter('omcgenerator_active_articles')){
            $sSelect .= " and oxactive = 1";
        }
        if($oConfig->getRequestParameter('omcgenerator_download_articles')){
            $sSelect .= " and oxisdownloadable = 1";
        }
        $oArticleList = oxNew('oxarticlelist');
        $oArticleList->selectString($sSelect);

        return $oArticleList;
    }

    protected function _createJsonFile($oArticle){
        $oConfig = oxRegistry::getConfig();
        $sPath = getShopBasePath() . "export/";
        $sName = $this->_getCleanName($oArticle->oxarticles__oxtitle->value);
        $sVendor = $oConfig->getRequestParameter('omcgenerator_default_vendor');
        if(empty($sVendor)) {
            $oVendor = $oArticle->getVendor();
            if($oVendor){
                $sVendor = $oVendor->getTitle();
            }
        }
        $aData = array(
            "name"      => $oArticle->oxarticles__oxtitle->value,
            "vendor"    => $sVendor,
            "id"        => "",
            "type"      => "oxid",
            "picture"   => $oArticle->getThumbnailUrl(),
            "price"     => $oArticle->getPrice()->getBruttoPrice(),
            "license"   => "",
            "desc"      => array(
                "de"        => $oArticle->oxarticles__oxshortdesc->value,
                "en"        => "",
            ),
            "tags"      => array(),
            "versions"  => array(
                "1.0.0"     => array(
                    "project"   => $oArticle->getLink(),
                    "url"       => "",
                    "supported" => array(),
                    "mapping"   => array(
                        "src"       => "",
                        "dest"      => ""
                    )
                )
            )
        );

        $sFullName = $sName . ".json";
        $sShopUrl = oxRegistry::getConfig()->getShopUrl();
        $this->_aGeneratedFiles[$sName] = $sShopUrl . "export/" . $sFullName;


        file_put_contents($sPath . $sFullName, json_encode($aData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }

    protected function _getCleanName($sName){
        $aSearch = array(" ", "/", "-", "_", "|", "\\", "(", ")");
        $sName = str_replace($aSearch, "", $sName);

        return strtolower($sName);
    }
}