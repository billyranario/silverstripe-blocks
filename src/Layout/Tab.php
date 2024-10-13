<?php

namespace TheHustle\Layout;

use DNADesign\Elemental\Extensions\ElementalAreasExtension;
use DNADesign\Elemental\Models\BaseElement;
use DNADesign\Elemental\Models\ElementalArea;
use SilverStripe\ORM\FieldType\DBVarchar;
use SilverStripe\ORM\ArrayList;
use SilverStripe\View\ArrayData;

class Tab extends BaseElement
{

    private static string $table_name = 'TabBlock';
    private static string $title = 'TabGroup';
    private static string $description = 'Tab group containing multiple tab items';
    private static string $singular_name = 'Tab Container';
    private static string $plural_name = 'Tab Containers';
    private static string $icon = 'font-icon-block-file-list';

    private static $db = [
        'Title' => DBVarchar::class,
    ];

    private static $has_one = [
        'Elements' => ElementalArea::class,
    ];

    private static $owns = [
        'Elements'
    ];

    private static array $cascade_deletes = [
        'Elements'
    ];

    private static array $cascade_duplicates = [
        'Elements'
    ];

    private static array $extensions = [
        ElementalAreasExtension::class
    ];

    public function getType(): string
    {
        return _t(__CLASS__ . '.BlockType', 'Tab Container');
    }

    public function getSummary(): string
    {
        $count = $this->Elements()->Elements()->Count();
        $suffix = $count === 1 ? 'tab' : 'tabs';

        return 'Contains ' . $count . ' ' . $suffix;
    }

    public function getOwnedAreaRelationName(): string
    {
        $has_one = $this->config()->get('has_one');

        foreach ($has_one as $relationName => $relationClass) {
            if ($relationClass === ElementalArea::class && $relationName !== 'Parent') {
                return $relationName;
            }
        }

        return 'Elements';
    }

    public function inlineEditable(): bool
    {
        return false;
    }

    public function getTabItemElements() {
        $tabItemElements = ArrayList::create();
        $elementalArea = $this->Elements();
    
        if ($elementalArea && $elementalArea->Elements()->exists()) {
            foreach ($elementalArea->Elements() as $element) {
                $tabItemElements->push(ArrayData::create([
                    'ID' => $element->ID,
                    'Title' => $element->Title,
                ]));
            }
        }
    
        return $tabItemElements;
    }

}
