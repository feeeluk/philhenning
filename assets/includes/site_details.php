<?php
    
    // set website location
    $site = "http://philhenning.atwebpages.com/";

    // set site title
    $siteTitle = "TEST";

    switch($site)
    {
        case "http://philhenning.atwebpages.com/":
        
        $testingLink = "https://www.philhenning.co.uk".$_SERVER['REQUEST_URI'];
        $portal = "http://portalstatic.awardspace.co.uk ";
        $snowCompare = "http://snowcompare.atwebpages.com";
        $snowCompareShop = "http://snowcompareshop.atwebpages.com";
        $university = "http://philhenning.atwebpages.com/university/";
        $treedata = "https://treedata.philhenning.co.uk";
        $pointsAcademy = "http://academy.awardspace.co.uk";

        break;

        case "https://www.philhenning.co.uk/":
    
        $testingLink = "http://philhenning.atwebpages.com/".$_SERVER['REQUEST_URI'];
        $portal = "http://portalstatic.awardspace.co.uk ";
        $snowCompare = "http://snowcompare.atwebpages.com";
        $snowCompareShop = "http://snowcompareshop.atwebpages.com";
        $university = "http://philhenning.atwebpages.com/university/";
        $treedata = "https://treedata.philhenning.co.uk";
        $pointsAcademy = "http://academy.awardspace.co.uk";

        break;
    }
?>