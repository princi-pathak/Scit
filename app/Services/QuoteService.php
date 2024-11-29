<?php
namespace App\Services;

use App\Models\Quote;
use Illuminate\Support\Facades\Auth;

class QuoteService
{
    public function saveQuoteData(array $data, string $quoteRefId, int $homeId): Quote
    {
        return Quote::updateOrCreate(
            ['quote_ref' => $quoteRefId],
            array_merge(['home_id' => $homeId], $data)
        );
    }
}
