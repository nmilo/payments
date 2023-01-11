<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;

class PaymentsReportService
{
    /**
     * Return all approved payments
     */
    private function getReportData()
    {
        return DB::select(DB::raw(
            "SELECT pa.payment_id, payment_type, p.total_amount, tp.amount
            FROM payment_approvals pa
            LEFT JOIN payments p ON  pa.payment_id  = p.id AND pa.payment_type ='payment'
            LEFT JOIN travel_payments tp ON  pa.payment_id  = tp.id AND pa.payment_type ='travel_payment'
            INNER JOIN users u
            ON pa.user_id = u.id
            GROUP BY pa.payment_id, pa.payment_type
            HAVING COUNT(DISTINCT pa.user_id) = (SELECT COUNT(*) FROM users);
            "
        ));
    }

    /**
     * Return detailed report of approved payments
     */
    public function detailedReport()
    {
        return $this->getReportData();
    }

    /**
     * Return total value of all approved payments
     */
    public function paymentsSum()
    {
        $approvedPayments = $this->getReportData();
        $totalValue = 0;

        foreach($approvedPayments as $payment)
        {
            $totalValue+= $payment->total_amount;
            $totalValue += $payment->amount;
        }

        return [ 'sum' => $totalValue];
    }
}
