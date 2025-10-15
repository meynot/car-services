<?php

namespace App\Http\Controllers;

use App\Exports\InvoicesExport;
use App\Exports\PaymentsExport;
use App\Exports\ExpensesExport;
use App\Exports\DashboardExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportInvoices(Request $request)
    {
        $period = $request->get('period', 'today');
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');
        
        $filename = 'invoices_' . $period . '_' . now()->format('Y-m-d_H-i-s') . '.xlsx';
        
        return Excel::download(new InvoicesExport($period, $startDate, $endDate), $filename);
    }

    public function exportPayments(Request $request)
    {
        $period = $request->get('period', 'today');
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');
        
        $filename = 'payments_' . $period . '_' . now()->format('Y-m-d_H-i-s') . '.xlsx';
        
        return Excel::download(new PaymentsExport($period, $startDate, $endDate), $filename);
    }

    public function exportExpenses(Request $request)
    {
        $period = $request->get('period', 'today');
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');
        
        $filename = 'expenses_' . $period . '_' . now()->format('Y-m-d_H-i-s') . '.xlsx';
        
        return Excel::download(new ExpensesExport($period, $startDate, $endDate), $filename);
    }

    public function exportAll(Request $request)
    {
        $period = $request->get('period', 'today');
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');
        
        $filename = 'dashboard_data_' . $period . '_' . now()->format('Y-m-d_H-i-s') . '.xlsx';
        
        return Excel::download(new DashboardExport($period, $startDate, $endDate), $filename);
    }
}