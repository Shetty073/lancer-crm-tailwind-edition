<?php

namespace App\Http\Controllers;

use App\Lancer\Utilities;
use App\Models\Client;
use App\Models\Enquiry;
use App\Models\EnquiryStatus;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;

class EnquiriesController extends Controller
{
    protected $utilities;

    public function __construct(Utilities $utilities)
    {
        // For referencing the Utilities class from our blade templates
        $this->utilities = $utilities;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Reference to the Utilities class
        $utilities = $this->utilities;

        $enquiries = Enquiry::all();

        return view('enquiries.index', compact('enquiries', 'utilities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $enquiry_statuses = EnquiryStatus::paginate(3);
        $projects = Project::all();

        return view('enquiries.create', compact('enquiry_statuses', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'contact_no' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:6',
            'subject' => 'required',
            'enquiry_status' => 'required',
        ]);

        if ($request->input('email')) {
            $this->validate($request, [
                'email' => 'email',
            ]);
        }

        $status = EnquiryStatus::where('id', $request->input('enquiry_status'))->first();

        $enquiry = new Enquiry();
        $enquiry->name = $request->input('name');
        $enquiry->business_name = $request->input('business_name');
        $enquiry->email = $request->input('email');
        $enquiry->contact_no = $request->input('contact_no');
        $enquiry->subject = $request->input('subject');

        $enquiry->enquiry_status()->associate($status);

        $project = Project::where('id', $request->input('project_id'))->first();
        $enquiry->project()->associate($project);
        $enquiry->save();

        // $enquiry->services()->attach($request->input('services'));

        return redirect(route('enquiries.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $enquiry = Enquiry::where('id', $id)->first();

        if($enquiry->enquiry_status->id === 4) {
            return redirect(route('enquiries.index'));
        }

        $followups = $enquiry->follow_ups;
        $projects = Project::all();
        $enquiry_statuses = EnquiryStatus::paginate(3);

        return view('enquiries.show', compact('enquiry', 'followups', 'projects', 'enquiry_statuses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enquiry = Enquiry::where('id', $id)->first();

        if($enquiry->enquiry_status->id === 4) {
            return redirect(route('enquiries.index'));
        }

        $enquiry_statuses = EnquiryStatus::paginate(3);
        $projects = Project::all();

        return view('enquiries.edit', compact('enquiry', 'enquiry_statuses', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'business_name' => 'required',
            'email' => 'email',
            'contact_no' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:6',
            'subject' => 'required',
            'enquiry_status' => 'required',
        ]);

        $status = EnquiryStatus::where('id', $request->input('enquiry_status'))->first();

        $enquiry = Enquiry::where('id', $id)->first();
        $enquiry->name = $request->input('name');
        $enquiry->business_name = $request->input('business_name');
        $enquiry->email = $request->input('email');
        $enquiry->contact_no = $request->input('contact_no');
        $enquiry->subject = $request->input('subject');

        $enquiry->enquiry_status()->associate($status);

        $project = Project::where('id', $request->input('project_id'))->first();
        $enquiry->project()->associate($project);
        $enquiry->save();

        return redirect(route('enquiries.index'));
    }

    public function updateStatus(Request $request, $id)
    {
        $this->validate($request, [
            'project_id' => 'required',
            'enquiry_status' => 'required',
        ]);

        $status = EnquiryStatus::where('id', $request->input('enquiry_status'))->first();
        $project = Project::where('id', $request->input('project_id'))->first();
        $enquiry = Enquiry::findorfail($id);
        $enquiry->enquiry_status()->associate($status);
        $enquiry->project()->associate($project);
        $enquiry->save();

        return redirect(route('enquiries.show', ['id' => $id]));
    }

    public function transfer(Request $request, $id)
    {
        $enquiry = Enquiry::findorfail($id);

        Client::create([
            'name' => $enquiry->name,
            'business_name' => $enquiry->business_name,
            'email' => $enquiry->email,
            'contact_no' => $enquiry->contact_no,
            'subject' => $enquiry->subject,
            'project_id' =>$enquiry->project_id,
        ]);

        $enquiry->update([
            'status' => 5,
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enquiry = Enquiry::findorfail($id);
        $status = EnquiryStatus::where('id', 4)->first();
        $enquiry->update([
            'is_lost' => true,
        ]);
        $enquiry->enquiry_status()->associate($status);
        $enquiry->save();

        return back();
    }
}
