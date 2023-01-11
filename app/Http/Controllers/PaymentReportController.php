<?php

namespace App\Http\Controllers;

use App\Http\Services\PaymentsReportService;

class PaymentReportController extends Controller
{
    /**
     * @var PaymentsReportService
     */
    public $paymentsReportService;

    /**
     * @param PaymentsReportService $paymentsReportService
     *
     * @return void
     */
    public function __construct(PaymentsReportService $paymentsReportService)
    {
        $this->paymentsReportService = $paymentsReportService;
    }

    /**
     * Report payments
     *
     * @return \Illuminate\Http\Response
     */
    public function detailedReport()
    {
        return $this->paymentsReportService->detailedReport();
    }

    /**
     * Report payments
     *
     * @return \Illuminate\Http\Response
     */
    public function paymentsSum()
    {
        return $this->paymentsReportService->paymentsSum();
    }
}
