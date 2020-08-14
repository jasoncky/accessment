<?php

namespace App\Http\Controllers\Admin;

use App\Sentence;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySentenceRequest;
use App\Http\Requests\StoreSentenceRequest;
use App\Http\Requests\UpdateSentenceRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SentencesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sentence_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sentences = Sentence::all();

        return view('admin.sentences.index', compact('sentences'));
    }

    public function create()
    {
        abort_if(Gate::denies('sentence_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.sentences.create');
    }

    public function store(StoreSentenceRequest $request)
    {
        $sentence = Sentence::create($request->all());
        return redirect()->route('admin.sentences.index');
    }

    public function edit(Sentence $sentence)
    {
        abort_if(Gate::denies('sentence_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sentences.edit', compact('sentence'));
    }

    public function update(UpdateSentenceRequest $request, Sentence $sentence)
    {
        $sentence->update($request->all());

        return redirect()->route('admin.sentences.index');
    }

    public function show(Sentence $sentence)
    {
        abort_if(Gate::denies('sentence_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sentences.show', compact('sentence'));
    }

    public function destroy(Sentence $sentence)
    {
        abort_if(Gate::denies('sentence_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sentence->delete();

        return back();
    }

    public function massDestroy(MassDestroySentenceRequest $request)
    {
        Sentence::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
