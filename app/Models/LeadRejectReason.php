<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadRejectReason extends Model
{
    use HasFactory;

    protected $fillable = ['lead_ref', 'reject_type_id', 'reject_reason'];
}
