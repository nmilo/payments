<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTravelPaymentRequest;
use App\Http\Requests\UpdateTravelPaymentRequest;
use App\Http\Resources\TravelPaymentResource;
use App\Http\Services\TravelPaymentsService;
use App\Models\TravelPayment;
use Facade\FlareClient\Http\Response;

class TravelTravelPaymentController extends Controller
{
    /**
     * @var TravelPaymentsService
     */
    public $travelPaymentService;

    /**
     * @param TravelPaymentsService $travelPaymentService
     *
     * @return void
     */
    public function __construct(TravelPaymentsService $travelPaymentService)
    {
        $this->travelPaymentService = $travelPaymentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->travelPaymentService->getTravelPayments();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTravelPaymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTravelPaymentRequest $request)
    {
        return $this->travelPaymentService->storeTravelPayment([
            'user_id' => $request->user()->id,
            'total_amount' => $request->total_amount
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TravelPayment  $travelPayment
     * @return \Illuminate\Http\Response
     */
    public function show(TravelPayment $travelPayment)
    {
        return $this->travelPaymentService->getTravelPayment($travelPayment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTravelPaymentRequest  $request
     * @param  \App\Models\TravelPayment  $travelPayment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTravelPaymentRequest $request, TravelPayment $travelPayment)
    {
       $this->travelPaymentService->updateTravelPayment($travelPayment, $request->validated());

        return new TravelPaymentResource($travelPayment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TravelPayment  $travelPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(TravelPayment $travelPayment)
    {
        $this->travelPaymentService->deleteTravelPayment($travelPayment);

        return response('Deleted', 200);
    }
}
