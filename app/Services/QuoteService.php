<?php
namespace App\Services;

use App\Models\Quote;

class QuoteService
{
    public function saveQuoteData(array $data, string $quoteRefId, int $homeId): Quote
    {
        return Quote::updateOrCreate( ['id' => $data['quote_id']], array_merge(['home_id' => $homeId, 'quote_ref' => $quoteRefId], $data));
    }

    public function generateQuoteRef()
    {
        $lastQuote = Quote::orderBy('id', 'desc')->first();
        $nextId = $lastQuote ? $lastQuote->id + 1 : 1;
        return 'QU-' . str_pad($nextId, 4, '0', STR_PAD_LEFT);
    }
}
