<?php

namespace TheHustle\Layout;

use DNADesign\Elemental\Extensions\ElementalAreasExtension;
use DNADesign\Elemental\Models\BaseElement;
use DNADesign\Elemental\Models\ElementalArea;
use SilverStripe\ORM\FieldType\DBVarchar;

class AccordionItem extends BaseElement
{

    private static string $table_name = 'AccordionItem';
    private static string $title = 'AccordionItem';
    private static string $description = 'Accordion item containing multiple elements';
    private static string $singular_name = 'Accordion Item';
    private static string $plural_name = 'Accordion Items';
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
        return _t(__CLASS__ . '.BlockType', 'Accordion Item');
    }

    public function getSummary(): string
    {
        $count = $this->Elements()->Elements()->Count();
        $suffix = $count === 1 ? 'element' : 'elements';

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

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        return $fields;
    }
}
