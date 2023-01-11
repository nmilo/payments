<?php

namespace App\Http\Services;

use App\Http\Resources\TravelPaymentResource;
use App\Models\TravelPayment;

class TravelPaymentsService
{
    /**
     * @return TravelPaymentResource
     */
    public function getTravelPayments()
    {
        $travelPayments = TravelPayment::paginate();
        return TravelPaymentResource::collection($travelPayments);
    }

    /**
     * @param TravelPayment $travelPayment
     *
     * @return TravelPaymentResource
     */
    public function getTravelPayment(TravelPayment $travelPayment)
    {
        return new TravelPaymentResource($travelPayment);
    }

    /**
     * @param array $data
     *
     * @return TravelPaymentResource
     */
    public function storeTravelPayment(array $data)
    {
        $travelPayment = TravelPayment::create($data);

        return new TravelPaymentResource($travelPayment);
    }

    /**
     * @param TravelPayment   $travelPayment
     * @param array $request
     *
     * @return bool|null
     * @throws Exception
     */
    public function updateTravelPayment(TravelPayment $travelPayment, $data): bool
    {
        return $travelPayment->update($data);
    }

    /**
     * @param TravelPayment $travelPayment
     *
     * @return bool
     * @throws Exception
     */
    public function deleteTravelPayment(TravelPayment $travelPayment)
    {
        return $travelPayment->delete();
    }
}
