<?php

namespace TheHustle\Extensions;

use SilverStripe\Core\Extension;
use SilverStripe\View\Requirements;

class BlockPageControllerExtension extends Extension
{
    public function onAfterInit()
    {
        Requirements::javascript('thehustle/silverstripe-tabs: client/dist/js/accordion.js');
        Requirements::javascript('thehustle/silverstripe-tabs: client/dist/js/tabs.js');
    }
}
