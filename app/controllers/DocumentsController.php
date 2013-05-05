<?php

class DocumentsController extends BaseController {

    /**
     * Document Repository
     *
     * @var Document
     */
    protected $document;

    public function __construct(Document $document)
    {
        $this->document = $document;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $documents = $this->document->where('user_id', Auth::user()->id)->where('hidden',false)->get();

        return View::make(t('profile.documents.index'), compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make(t('profile.documents.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Document::$rules);

        // Prepare data to be stored in the DB
        $input['user_id'] = Auth::user()->id;
        $input['provided'] = Document::data($input['provided']);
        $input['expiry'] = Document::data($input['expiry']);

        if ($validation->passes())
        {
            $this->document->create($input);

            return Redirect::route('profile.documents.index');
        }

        return Redirect::route('profile.documents.create')
            ->withInput()
            ->withErrors($validation)
            ->with('flash', 'There were validation errors.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $document = $this->document->findOrFail($id);

        return View::make(t('profile.documents.show'), compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $document = $this->document->find($id);

        if (is_null($document))
        {
            return Redirect::route('profile.documents.index');
        }

        return View::make(t('profile.documents.edit'), compact('document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
        $validation = Validator::make($input, Document::$rules);

        if ($validation->passes())
        {
            $document = $this->document->find($id);
            $document->update($input);

            return Redirect::route('profile.documents.show', $id);
        }

        return Redirect::route('profile.documents.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('flash', 'There were validation errors.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->document->find($id)->delete();

        return Redirect::route('profile.documents.index');
    }

}
