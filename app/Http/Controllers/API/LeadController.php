<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Http\Requests\API\LeadRequest;
use App\Http\Resources\LeadResource;
use App\Models\Lead;
use App\Repositories\LeadRepositoryInterface;
use Illuminate\Http\Request;

class LeadController extends BaseController
{

    private $leadRepository;

    public function __construct(LeadRepositoryInterface $leadRepository)
    {
        $this->leadRepository = $leadRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leads = $this->leadRepository->all();
        return $this->sendResponse(LeadResource::collection($leads), 'Leads retrieved successfully.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LeadRequest $request)
    {
        $lead = new Lead();
        $lead->first_name = $request->first_name;
        $lead->last_name = $request->last_name;
        $lead->full_name = $request->first_name . ' ' . $request->last_name;
        $lead->description = $request->description;
        $lead->address = $request->address;
        $lead->gender = strtolower($request->gender);
        $lead->created_by = $request->user()->id;
        $lead->save();

        return $this->sendResponse(new LeadResource($lead, 'create'), 'Lead created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lead = Lead::find($id);

        if (is_null($lead)) {
            return $this->sendError('Lead not found.');
        }

        return $this->sendResponse(new LeadResource($lead), 'Lead retrieved successfully.');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LeadRequest $request, $id)
    {
        $lead = Lead::find($id);

        if (is_null($lead)) {
            return $this->sendError('Lead not found.');
        }

        $lead->first_name = $request->first_name;
        $lead->last_name = $request->last_name;
        $lead->full_name = $request->first_name . ' ' . $request->last_name;
        $lead->description = $request->description;
        $lead->address = $request->address;
        $lead->gender = strtolower($request->gender);
        $lead->updated_by = $request->user()->id;
        $lead->save();

        return $this->sendResponse(new LeadResource($lead, 'update'), 'Lead updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $lead = Lead::find($id);

        if (is_null($lead)) {
            return $this->sendError('Lead not found.');
        }

        $lead->deleted_by = $request->user()->id;
        $lead->save();
        $lead->delete();

        return $this->sendResponse(new LeadResource($lead, 'delete'), 'Lead deleted successfully.');
    }
}
