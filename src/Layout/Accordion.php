<?php

namespace TheHustle\Layout;

use DNADesign\Elemental\Extensions\ElementalAreasExtension;
use DNADesign\Elemental\Models\BaseElement;
use DNADesign\Elemental\Models\ElementalArea;
use SilverStripe\ORM\FieldType\DBVarchar;
use SilverStripe\ORM\ArrayList;
use SilverStripe\View\ArrayData;

class Accordion extends BaseElement
{

    private static string $table_name = 'AccordionBlock';
    private static string $title = 'Accordion Group';
    private static string $description = 'Accordion group containing multiple accordion items';
    private static string $singular_name = 'Accordion Container';
    private static string $plural_name = 'Accordion Containers';
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
        return _t(__CLASS__ . '.BlockType', 'Accordion Container');
    }

    public function getSummary(): string
    {
        $count = $this->Elements()->Elements()->Count();
        $suffix = $count === 1 ? 'item' : 'items';

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

    public function getAccordionItemElements() {
        return $this->retrieveAccordionItems($this->Elements());
    }

    /**
     * Recursively retrieve all accordion items, including nested items.
     * 
     * @param ElementalArea $elementalArea
     * @return ArrayList
     */
    private function retrieveAccordionItems($elementalArea) {
        $accordionItemElements = ArrayList::create();

        if ($elementalArea && $elementalArea->Elements()->exists()) {
            foreach ($elementalArea->Elements() as $element) {
                $accordionItemElements->push(ArrayData::create([
                    'ID' => $element->ID,
                    'Title' => $element->Title,
                    'Content' => $element->forTemplate(),
                ]));

                if ($element instanceof ElementalArea && $element->Elements()->exists()) {
                    $nestedItems = $this->retrieveAccordionItems($element);
                    $accordionItemElements->merge($nestedItems); // Add nested items to the list
                }
            }
        }

        return $accordionItemElements;
    }
}
