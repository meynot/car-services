<?php

namespace App\Exports;

use App\Models\Invoice;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class InvoicesExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    protected $period;
    protected $startDate;
    protected $endDate;

    public function __construct($period = 'today', $startDate = null, $endDate = null)
    {
        $this->period = $period;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function collection()
    {
        $query = Invoice::with(['items.service', 'payments']);

        switch ($this->period) {
            case 'today':
                $query->whereDate('date', today());
                break;
            case 'yesterday':
                $query->whereDate('date', today()->subDay());
                break;
            case 'this-week':
                $query->whereBetween('date', [now()->startOfWeek(), now()->endOfWeek()]);
                break;
            case 'last-week':
                $query->whereBetween('date', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()]);
                break;
            case 'current-month':
                $query->whereMonth('date', now()->month)->whereYear('date', now()->year);
                break;
            case 'last-month':
                $query->whereMonth('date', now()->subMonth()->month)->whereYear('date', now()->subMonth()->year);
                break;
            case 'last-3-months':
                $query->where('date', '>=', now()->subMonths(3)->startOfMonth());
                break;
            case 'current-year':
                $query->whereYear('date', now()->year);
                break;
            case 'last-year':
                $query->whereYear('date', now()->subYear()->year);
                break;
            case 'custom':
                if ($this->startDate && $this->endDate) {
                    $query->whereBetween('date', [$this->startDate, $this->endDate]);
                }
                break;
        }

        return $query->orderBy('date', 'desc')->get();
    }

    public function headings(): array
    {
        return [
            __('invoice.invoice_number'),
            __('invoice.client_name'),
            __('invoice.phone'),
            __('invoice.date'),
            __('invoice.total_amount'),
            __('invoice.discount'),
            __('invoice.total_after_discount'),
            __('invoice.amount_paid'),
            __('invoice.remaining_balance'),
            __('invoice.status'),
            __('invoice.items_count'),
        ];
    }

    public function map($invoice): array
    {
        return [
            '#' . $invoice->id,
            $invoice->client_name,
            $invoice->phone,
            $invoice->date->format('Y-m-d'),
            $invoice->total_amount,
            $invoice->discount ?? 0,
            $invoice->total_after_discount,
            $invoice->amount_paid,
            $invoice->remaining_balance,
            $invoice->is_fully_paid ? __('invoice.paid') : __('invoice.outstanding'),
            $invoice->items->count(),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
