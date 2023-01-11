<?php

namespace App\Http\Controllers;

use App\Http\Services\PaymentApprovalService;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentApprovalController extends Controller
{
    /**
     * @var PaymentApprovalService
     */
    public $paymentApprovalService;

    /**
     * @param PaymentApprovalService $paymentApprovalService
     *
     * @return void
     */
    public function __construct(PaymentApprovalService $paymentApprovalService)
    {
        $this->paymentApprovalService = $paymentApprovalService;
    }

    /**
     * Update payment status
     *
     * @param Payment $payment
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function approvePayment(Payment $payment, Request $request)
    {
        return $this->paymentApprovalService->approvePayment($payment, $request->user()->id);
    }
}
