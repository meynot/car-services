<?php

namespace App\Exports;

use App\Models\Invoice;
use App\Models\InvoicePayment;
use App\Models\Expense;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class DashboardExport implements WithMultipleSheets
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

    public function sheets(): array
    {
        return [
            'Invoices' => new InvoicesExport($this->period, $this->startDate, $this->endDate),
            'Payments' => new PaymentsExport($this->period, $this->startDate, $this->endDate),
            'Expenses' => new ExpensesExport($this->period, $this->startDate, $this->endDate),
        ];
    }
}
