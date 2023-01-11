<?php

namespace App\Http\Services;

use App\Models\Payment;
use App\Models\PaymentApproval;

class PaymentApprovalService
{
    /**
     * @param Payment $payment
     * @param $userId
     */
    public function approvePayment(Payment $payment, $userId)
    {
        return PaymentApproval::updateOrCreate([
            'user_id' => $userId,
            'payment_id' => $payment->id,
        ], [
            'status' => 'approved'
        ]);
    }
}
