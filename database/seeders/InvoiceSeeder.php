<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\InvoicePayment;
use App\Enums\PaymentMethod;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample services
        $services = [
            [
                'name' => 'Oil Change',
                'description' => 'Complete oil change service with filter replacement',
                'price' => 45.00,
            ],
            [
                'name' => 'Brake Service',
                'description' => 'Brake pad replacement and brake fluid check',
                'price' => 150.00,
            ],
            [
                'name' => 'Tire Rotation',
                'description' => 'Rotate tires for even wear',
                'price' => 25.00,
            ],
            [
                'name' => 'Engine Diagnostic',
                'description' => 'Computer diagnostic scan and analysis',
                'price' => 80.00,
            ],
            [
                'name' => 'AC Service',
                'description' => 'Air conditioning system check and recharge',
                'price' => 120.00,
            ],
            [
                'name' => 'Transmission Service',
                'description' => 'Transmission fluid change and filter replacement',
                'price' => 200.00,
            ],
            [
                'name' => 'Battery Replacement',
                'description' => 'Car battery replacement and testing',
                'price' => 180.00,
            ],
            [
                'name' => 'Spark Plug Replacement',
                'description' => 'Replace spark plugs and wires',
                'price' => 90.00,
            ],
            [
                'name' => 'Air Filter Replacement',
                'description' => 'Engine air filter replacement',
                'price' => 35.00,
            ],
            [
                'name' => 'Cabin Filter Replacement',
                'description' => 'Cabin air filter replacement',
                'price' => 40.00,
            ],
            [
                'name' => 'Wheel Alignment',
                'description' => 'Four-wheel alignment service',
                'price' => 85.00,
            ],
            [
                'name' => 'Timing Belt Replacement',
                'description' => 'Timing belt and water pump replacement',
                'price' => 350.00,
            ],
            [
                'name' => 'Radiator Flush',
                'description' => 'Coolant system flush and refill',
                'price' => 75.00,
            ],
            [
                'name' => 'Power Steering Service',
                'description' => 'Power steering fluid change',
                'price' => 60.00,
            ],
            [
                'name' => 'Fuel System Cleaning',
                'description' => 'Fuel injector cleaning service',
                'price' => 95.00,
            ],
            [
                'name' => 'Exhaust System Repair',
                'description' => 'Exhaust pipe and muffler repair',
                'price' => 250.00,
            ],
            [
                'name' => 'Suspension Service',
                'description' => 'Shock absorber and strut replacement',
                'price' => 400.00,
            ],
            [
                'name' => 'Clutch Replacement',
                'description' => 'Clutch disc and pressure plate replacement',
                'price' => 500.00,
            ],
            [
                'name' => 'Alternator Replacement',
                'description' => 'Alternator replacement and testing',
                'price' => 300.00,
            ],
            [
                'name' => 'Starter Motor Replacement',
                'description' => 'Starter motor replacement',
                'price' => 280.00,
            ],
        ];

        foreach ($services as $serviceData) {
            Service::create($serviceData);
        }

        // Create sample invoices
        $invoices = [
            [
                'client_name' => 'John Smith',
                'phone' => '555-0123',
                'date' => now()->subDays(5),
                'total_amount' => 200.00,
                'discount' => 10.00,
            ],
            [
                'client_name' => 'Sarah Johnson',
                'phone' => '555-0456',
                'date' => now()->subDays(3),
                'total_amount' => 175.00,
                'discount' => 0.00,
            ],
            [
                'client_name' => 'Mike Davis',
                'phone' => '555-0789',
                'date' => now()->subDays(1),
                'total_amount' => 300.00,
                'discount' => 25.00,
            ],
        ];

        $createdInvoices = [];
        foreach ($invoices as $invoiceData) {
            $createdInvoices[] = Invoice::create($invoiceData);
        }

        // Create sample invoice items
        $invoiceItems = [
            // Invoice 1 items
            [
                'invoice_id' => 1,
                'service_id' => 1, // Oil Change
                'price' => 45.00,
                'parts_price' => 15.00,
            ],
            [
                'invoice_id' => 1,
                'service_id' => 3, // Tire Rotation
                'price' => 25.00,
                'parts_price' => 0.00,
            ],
            [
                'invoice_id' => 1,
                'service_id' => 4, // Engine Diagnostic
                'price' => 80.00,
                'parts_price' => 35.00,
            ],
            // Invoice 2 items
            [
                'invoice_id' => 2,
                'service_id' => 2, // Brake Service
                'price' => 150.00,
                'parts_price' => 25.00,
            ],
            // Invoice 3 items
            [
                'invoice_id' => 3,
                'service_id' => 2, // Brake Service
                'price' => 150.00,
                'parts_price' => 30.00,
            ],
            [
                'invoice_id' => 3,
                'service_id' => 5, // AC Service
                'price' => 120.00,
                'parts_price' => 0.00,
            ],
        ];

        foreach ($invoiceItems as $itemData) {
            InvoiceItem::create($itemData);
        }

        // Create sample payments
        $payments = [
            [
                'invoice_id' => 1,
                'date' => now()->subDays(4),
                'amount' => 100.00,
                'payment_method' => PaymentMethod::CASH,
            ],
            [
                'invoice_id' => 1,
                'date' => now()->subDays(2),
                'amount' => 90.00,
                'payment_method' => PaymentMethod::VISA,
            ],
            [
                'invoice_id' => 2,
                'date' => now()->subDays(2),
                'amount' => 175.00,
                'payment_method' => PaymentMethod::BANK_TRANSFER,
            ],
            [
                'invoice_id' => 3,
                'date' => now()->subDays(1),
                'amount' => 150.00,
                'payment_method' => PaymentMethod::VISA,
            ],
        ];

        foreach ($payments as $paymentData) {
            InvoicePayment::create($paymentData);
        }
    }
}