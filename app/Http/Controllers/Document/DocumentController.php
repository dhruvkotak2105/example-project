<?php

namespace App\Http\Controllers\Document;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jobs\SendNewDocumentCreatedEmail;
use App\Document;
use App\Http\Resources\UserResource;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::latest()->paginate(5);
        return view("document.index",compact("documents"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('document.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'date' => 'required|date',
            // 'time' => 'required|date_format:H:i', // You might need to create a custom validation rule for time
            'email' => 'required|email|max:255',
        ]);

        // Create a new Document instance
        $document = new Document;
        $document->name = $request->name;
        $document->address = $request->address;
        $document->date = $request->date;
        $document->time = $request->time;
        $document->email = $request->email;

        // Save the Document to the database
        $document->save();

        // sending the mail when new document is created
        // dispatch(new SendNewDocumentCreatedEmail());

        // Redirect to a success page or return a response
        return redirect()->route('document.index')->with('success', 'Document created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = Document::findOrFail($id);

        // Transform the Post model into JSON using PostResource
        $documentResource = new UserResource($document);

        // You can also return it directly, Laravel will automatically convert it to JSON
        return $documentResource;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $document = Document::findOrFail($id);
        return view("document.edit",compact("document"));
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
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i:s',
            'email' => 'required|email|max:255',
        ]);

        // Find the document by ID
        Document::where('id', $id)->update([
            'name' => $request->name,
            'address' => $request->address,
            'date' => $request->date,
            'time' => $request->time,
            'email' => $request->email,
        ]);

        return redirect()->route('document.index')->with('success', 'Document updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $document = Document::findOrFail($id);

        $document->delete();

        return redirect()->route('document.index')->with('success', 'Document deleted successfully.');
    }
}
