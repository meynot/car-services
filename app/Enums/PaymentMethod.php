<?php

namespace App\Enums;

enum PaymentMethod: string
{
    case CASH = 'cash';
    case VISA = 'visa';
    case BANK_TRANSFER = 'bank_transfer';

    public function label(): string
    {
        return match($this) {
            self::CASH => __('payments.cash'),
            self::VISA => __('payments.visa'),
            self::BANK_TRANSFER => __('payments.bank_transfer'),
        };
    }

    public function icon(): string
    {
        return match($this) {
            self::CASH => 'fas fa-money-bill-wave',
            self::VISA => 'fab fa-cc-visa',
            self::BANK_TRANSFER => 'fas fa-university',
        };
    }
}
