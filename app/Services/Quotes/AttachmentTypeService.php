<?php

namespace App\Services\Quotes;

use App\Models\QuoteAttachment;

class AttachmentTypeService
{
    public function saveAttachmentType(array $attachments, $file): ?QuoteAttachment
    {
        // Save the image using a reusable method
        $imageData = $this->saveImage($file);

        if ($imageData) {
            $data = [
                'quote_id' => $attachments['quote_id'],
                'attachment_type' => $attachments['attachment_type'],
                'original_name' => $imageData['original_name'],
                'timestamp_name' => $imageData['timestamped_name'],
                'mime_type' => $imageData['mime_type'],
                'size' => $imageData['size'], // Size in KiB
                'title' => $attachments['title'] ?? null,
                'description' => $attachments['description'] ?? null,
            ];
    
            // Save the data to the database
            return QuoteAttachment::create($data) ?: null;
        }
    }


    private function saveImage($file, $path = 'public/images/quoteAttachment'): ?array
    {
        if ($file) {

            // Get original file name and extension
            $originalName = $file->getClientOriginalName(); // Get original file name

            // Generate a unique file name with timestamp
            $timestampedName = time() . '.' . $file->getClientOriginalExtension();

            // Get MIME type and size
            $mimeType = $file->getClientMimeType(); // Get the MIME type
            $sizeInBytes  = $file->getSize(); // Get the file size
            $sizeInKiB = $sizeInBytes / 1024; // Convert bytes to kilobytes

            // You can round it to two decimal places for better readability
            $sizeInKiB = round($sizeInKiB, 2);

            // Move the file to the specified path with the timestamped name
            $file->storeAs($path, $timestampedName);


            return [
                'original_name' => $originalName,
                'timestamped_name' => $timestampedName,
                'mime_type' => $mimeType,
                'size' => $sizeInKiB,
            ];
        }
        return null;
    }

    public function getAttachmentType($id)
    {
        return QuoteAttachment::with('attachmentType')->find($id);
    }
}
