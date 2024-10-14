<?php

namespace TheHustle\Extensions;

use SilverStripe\Core\Extension;
use SilverStripe\View\Requirements;

class BlockPageControllerExtension extends Extension
{
    public function onAfterInit()
    {
        Requirements::javascript('thehustle/silverstripe-blocks: client/dist/js/accordion.js');
        Requirements::javascript('thehustle/silverstripe-blocks: client/dist/js/tabs.js');
        Requirements::css('thehustle/silverstripe-blocks: client/dist/css/accordion.css');
    }
}
