<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();

        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
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
            'business_name' => 'required',
            'email' => 'unique:clients,email',
            'contact_no' => 'unique:enquiries,contact_no|regex:/^([0-9\s\-\+\(\)]*)$/|min:6',
            'subject' => 'required',
            'remark' => 'remark',
        ]);

        Client::create([
            'name' => $request->input('name'),
            'business_name' => $request->input('business_name'),
            'email' => $request->input('email'),
            'contact_no' => $request->input('contact_no'),
            'subject' => $request->input('subject'),
            'remark' => $request->input('remark'),
        ]);

        return redirect(route('clients.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findorfail($id);

        return view('clients.edit', compact('client'));
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
        ]);

        $client = Client::findorfail($id);
        $client->update([
            'name' => $request->input('name'),
            'business_name' => $request->input('business_name'),
            'email' => $request->input('email'),
            'contact_no' => $request->input('contact_no'),
            'subject' => $request->input('subject'),
            'rating' => $request->input('rating'),
            'remark' => $request->input('remark'),
        ]);

        if($request->has('is_active')) {
            $client->is_active = true;
            $client->save();
        } else {
            $client->is_active = false;
            $client->save();
        }

        return redirect(route('clients.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findorfail($id);
        $client->update([
            'is_active' => 0,
        ]);

        return back();
    }
}
