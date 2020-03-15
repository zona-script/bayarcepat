<?php

namespace App\Http\Controllers\Dashboard;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $contacts = Contact::where('user_id', Auth::id())->get();
        return view('dashboard.contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $types = Contact::getTypes();
        return view('dashboard.contact.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone_number' => 'required|string',
            'type' => 'required|string',
            'customer_number' => 'required|string',
        ]);

        $contact = $request->only([
            'name',
            'phone_number',
            'type',
            'customer_number'
        ]);
        $contact = Arr::add($contact, 'user_id', Auth::id());
        Contact::create($contact);

        return redirect()->route('web.dashboard.contact.index')
            ->with('success', 'Kontak berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        return redirect()->route('web.dashboard.contact.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        $types = Contact::getTypes();
        return view('dashboard.contact.edit', compact('contact', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'phone_number' => 'required|string',
            'type' => 'required|string',
            'customer_number' => 'required|string',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update($request->only([
            'name',
            'phone_number',
            'type',
            'customer_number'
        ]));

        return redirect()->route('web.dashboard.contact.index')
            ->with('success', 'Kontak berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('web.dashboard.contact.index')
            ->with('success', 'Kontak berhasil dihapus.');
    }
}
