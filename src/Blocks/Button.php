<?php

namespace TheHustle\Blocks;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\DropdownField;

class Button extends BaseElement
{
    private static $singular_name = 'Button Block';
    private static $plural_name = 'Button Blocks';
    private static $table_name = 'ButtonBlock';

    private static $db = [
        'ButtonLabel' => 'Varchar(255)',
        'ButtonClass' => 'Varchar(255)',
        'RedirectLink' => 'Varchar(255)',
        'Width' => 'Enum("w-auto, w-full")',
        'OpenNewTab' => 'Boolean'
    ];

    private static $defaults = [
        'ButtonClass' => 'bg-primary hover:bg-primary-dark px-8 py-3',
        'Width' => 'w-auto'
    ];

    public function getType(): string
    {
        return 'Button';
    }

    public function populateDefaults()
    {
        parent::populateDefaults();

        $this->ButtonClass = 'bg-primary hover:bg-primary-dark px-8 py-3';
        $this->Width = 'w-auto';
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName('Title');

        $fields->addFieldToTab('Root.Main', TextField::create('ButtonLabel', 'Button Label'));
        $fields->addFieldToTab(
            'Root.Main',
            TextField::create('ButtonClass', 'Button CSS Class')
                ->setDescription('Default: bg-primary hover:bg-primary-dark px-8 py-3')
                ->setValue($this->ButtonClass)
        );
        $fields->addFieldToTab('Root.Main', TextField::create('RedirectLink', 'Redirect Link'));
        $fields->addFieldToTab(
            'Root.Main',
            DropdownField::create('Width', 'Button Width')
                ->setSource([
                    'w-auto' => 'Auto',
                    'w-full' => 'Full Width'
                ])
                ->setEmptyString('(None)')
                ->setValue($this->Width)
        );
        $fields->addFieldToTab('Root.Main', CheckboxField::create('OpenNewTab', 'Open in a new tab'));

        return $fields;
    }

    public function onBeforeWrite()
    {
        parent::onBeforeWrite();

        if (!$this->Title || $this->isChanged('ButtonLabel')) {
            $this->Title = "Button: ". $this->ButtonLabel;
        }
    }
}
