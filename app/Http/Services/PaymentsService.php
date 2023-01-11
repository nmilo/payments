<?php

namespace App\Http\Services;

use App\Http\Resources\PaymentResource;
use App\Models\Payment;

class PaymentsService
{
    /**
     * @return PaymentResource
     */
    public function getPayments()
    {
        $payments = Payment::paginate();
        return PaymentResource::collection($payments);
    }

    /**
     * @param Payment $payment
     *
     * @return PaymentResource
     */
    public function getPayment(Payment $payment)
    {
        return new PaymentResource($payment);
    }

    /**
     * @param array $data
     *
     * @return PaymentResource
     */
    public function storePayment(array $data)
    {
        $payment = Payment::create($data);

        return new PaymentResource($payment);
    }

    /**
     * @param Payment   $payment
     * @param array $request
     *
     * @return bool|null
     * @throws Exception
     */
    public function updatePayment(Payment $payment, $data): bool
    {
        return $payment->update($data);
    }

    /**
     * @param Payment $payment
     *
     * @return bool
     * @throws Exception
     */
    public function deletePayment(Payment $payment)
    {
        return $payment->delete();
    }
}
