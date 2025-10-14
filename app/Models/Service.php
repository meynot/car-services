<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'enabled',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'enabled' => 'boolean',
    ];

    /**
     * Get the invoice items for the service.
     */
    public function invoiceItems(): HasMany
    {
        return $this->hasMany(InvoiceItem::class);
    }

    /**
     * Scope a query to only include enabled services.
     */
    public function scopeEnabled($query)
    {
        return $query->where('enabled', true);
    }
}
