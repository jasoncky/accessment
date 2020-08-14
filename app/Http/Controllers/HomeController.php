<?php

namespace App\Http\Controllers;
use App\Sentence;

class HomeController extends Controller
{
    public function index()
    {
        /*$categories = Category::withCount('articles')
            ->with(['articles' => function($query) {
                $query->orderBy('id', 'desc');
            }])
            ->paginate(10);
        */
        $sentences = Sentence::orderBy('position', 'asc')->get()->keyBy('position')->toArray();
        //dd($sentences);
        return view('index', compact('sentences'));
    }
}
