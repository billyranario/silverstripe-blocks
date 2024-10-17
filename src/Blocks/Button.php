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
        'ButtonColor' => 'Enum("primary, secondary, tertiary", "primary")',
        'ButtonClass' => 'Varchar(255)',
        'RedirectLink' => 'Varchar(255)',
        'Width' => 'Enum("w-auto, w-full")',
        'OpenNewTab' => 'Boolean'
    ];

    private static $defaults = [
        'ButtonClass' => 'px-8 py-3 text-white',
        'ButtonColor' => 'primary',
        'Width' => 'w-auto'
    ];

    public function getType(): string
    {
        return 'Button';
    }

    public function populateDefaults()
    {
        parent::populateDefaults();
        $this->ButtonClass = 'px-8 py-3 text-white';
        $this->Width = 'w-auto';
        $this->ButtonColor = 'primary';
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName('Title');

        $fields->addFieldToTab('Root.Main', TextField::create('ButtonLabel', 'Button Label'));

        $fields->addFieldToTab(
            'Root.Main',
            DropdownField::create('ButtonColor', 'Button Color')
                ->setSource([
                    'primary' => 'Primary',
                    'secondary' => 'Secondary',
                    'tertiary' => 'Tertiary',
                ])
                ->setDescription('Select button color theme')
                ->setValue($this->ButtonColor)
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
            $this->Title = "Button: " . $this->ButtonLabel;
        }
    }
    
    public function getButtonClass()
    {
        $buttonClass = $this->getField('ButtonClass') ?: ''; // Fallback if ButtonClass is not set

        return $buttonClass;
    }
    
    public function ColorClass()
    {
        $colorClasses = [
            'primary' => 'bg-primary hover:bg-primary-dark',
            'secondary' => 'bg-secondary hover:bg-secondary-dark',
            'tertiary' => 'bg-tertiary hover:bg-teal-700', // Adjusted hover color for tertiary
        ];

        return $colorClasses[$this->getField('ButtonColor')] ?? 'bg-primary hover:bg-primary-dark';
    }
}
