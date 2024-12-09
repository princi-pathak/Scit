<?php
namespace App\Services\Quotes;

use App\Models\QuoteProduct;

class QuoteProductService
{
    public function saveItems(array $products, int $quoteId): void
    {
        foreach ($products as $productData) {
            $accountCode = $productData['account_code'] === '-No Department-' ? null : $productData['account_code'];
            
            QuoteProduct::create([
                'quote_id' => $quoteId,
                'product_id' => $productData['id'],
                'product_code' => $productData['product_code'],
                'title' => $productData['product_name'],
                'description' => $productData['description'] ?? null,
                'account_code' => $accountCode,
                'quantity' => $productData['quantity'],
                'cost_price' => $productData['cost_price'],
                'price' => $productData['price'],
                'markup' => $productData['markup'],
                'VAT' => $productData['VAT'],
                'discount' => $productData['discount'],
            ]);
        }
    }
}
