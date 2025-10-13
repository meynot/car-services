<?php

namespace Database\Seeders;

use App\Models\Expense;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $expenses = [
            [
                'date' => now()->subDays(1),
                'reference' => 'EXP-001',
                'amount' => 150.00,
                'description' => 'Office supplies and stationery',
            ],
            [
                'date' => now()->subDays(2),
                'reference' => 'EXP-002',
                'amount' => 75.50,
                'description' => 'Internet service monthly bill',
            ],
            [
                'date' => now()->subDays(3),
                'reference' => 'EXP-003',
                'amount' => 200.00,
                'description' => 'Equipment maintenance and repair',
            ],
            [
                'date' => now()->subDays(4),
                'reference' => 'EXP-004',
                'amount' => 45.00,
                'description' => 'Business lunch with client',
            ],
            [
                'date' => now()->subDays(5),
                'reference' => 'EXP-005',
                'amount' => 300.00,
                'description' => 'Software license renewal',
            ],
            [
                'date' => now()->subDays(6),
                'reference' => 'EXP-006',
                'amount' => 120.00,
                'description' => 'Marketing materials printing',
            ],
            [
                'date' => now()->subDays(7),
                'reference' => 'EXP-007',
                'amount' => 85.00,
                'description' => 'Office cleaning service',
            ],
            [
                'date' => now()->subDays(8),
                'reference' => 'EXP-008',
                'amount' => 250.00,
                'description' => 'Professional development course',
            ],
            [
                'date' => now()->subDays(9),
                'reference' => 'EXP-009',
                'amount' => 60.00,
                'description' => 'Coffee and snacks for office',
            ],
            [
                'date' => now()->subDays(10),
                'reference' => 'EXP-010',
                'amount' => 180.00,
                'description' => 'Utility bills (electricity, water)',
            ],
        ];

        foreach ($expenses as $expense) {
            Expense::create($expense);
        }
    }
}
