<?php

namespace App\Exports;

use App\Models\InvoicePayment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PaymentsExport implements FromCollection, WithHeadings, WithMapping, WithStyles
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
        $query = InvoicePayment::with('invoice');

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
            __('payments.payment_id'),
            __('invoice.invoice_number'),
            __('invoice.client_name'),
            __('payments.date'),
            __('payments.amount'),
            __('payments.payment_method'),
            __('payments.created_at'),
        ];
    }

    public function map($payment): array
    {
        return [
            '#' . $payment->id,
            '#' . $payment->invoice->id,
            $payment->invoice->client_name,
            $payment->date->format('Y-m-d'),
            $payment->amount,
            $payment->payment_method->label(),
            $payment->created_at->format('Y-m-d H:i:s'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
