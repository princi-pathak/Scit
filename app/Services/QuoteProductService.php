<?php
namespace App\Services;

use App\Models\Item;

class ItemService
{
    public function saveItems(array $items, int $quoteId): void
    {
        foreach ($items as $itemData) {
            if (isset($itemData['title']['item_title']) || isset($itemData['description']['item_description'])) {
                $itemDataToSave = [
                    'quote_id' => $quoteId,
                    'type' => 1, // Customize this as needed
                    'section_type' => $this->getSectionType($itemData),
                    'title' => $itemData['title']['item_title'] ?? null,
                    'description' => $itemData['description']['item_description'] ?? null,
                ];

                Item::create($itemDataToSave);
            }
        }
    }

    private function getSectionType(array $itemData): string
    {
        if (isset($itemData['title']['item_title'])) {
            return 'title';
        } elseif (isset($itemData['description']['item_description'])) {
            return 'description';
        }

        return 'unknown'; // Default type
    }
}
