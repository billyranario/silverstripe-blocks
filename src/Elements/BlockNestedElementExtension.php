<?php

namespace TheHustle\Elements;

use DNADesign\ElementalList\Model\ElementList;
use SilverStripe\CMS\Controllers\CMSPageEditController;
use SilverStripe\Control\Controller;
use SilverStripe\Core\Extension;
use TheHustle\Layout\Accordion;
use TheHustle\Layout\AccordionItem;
use TheHustle\Layout\TabItem;
use TheHustle\Layout\Tab;
use TheHustle\Layout\ColumnBlock;
use TheHustle\Layout\ContainerBlock;

class BlockNestedElementExtension extends Extension
{
    public function updateCMSEditLink(?string &$link): void
    {
        $owner = $this->owner;

        $relationName = $owner->getAreaRelationName();
        $page = $owner->getPage();

        if (!$page) {
            return;
        }

        if (
            $page instanceof Tab || 
            $page instanceof TabItem || 
            $page instanceof Accordion || 
            $page instanceof AccordionItem || 
            $page instanceof ColumnBlock || 
            $page instanceof ContainerBlock || 
            $page instanceof ElementList
        ) {
            $link = Controller::join_links(
                $page->CMSEditLink(),
                'ItemEditForm/field/' . $page->getOwnedAreaRelationName() . '/item/',
                $owner->ID
            );

            $link = preg_replace('/\/item\/([\d]+)\/edit/', '/item/$1', $link);
        } else {
            $link = Controller::join_links(
                singleton(CMSPageEditController::class)->Link('EditForm'),
                $page->ID,
                'field/' . $relationName . '/item/',
                $owner->ID
            );
        }

        $link = Controller::join_links(
            $link,
            'edit'
        );
    }
}
