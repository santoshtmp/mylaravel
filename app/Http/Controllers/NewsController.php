<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(request()->tag);
        //
        $data = [
            'heading' => 'Heading Title',
            'datas' => News::latest('id')->filter(request(['tags', 'search']))->paginate(6),
            'parameter' => 'news',
            'search' => request()->search
        ];
        return view('news/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd(request());
        // dd(request()->file('logo'));
        $formFields = $request->validate([
            'title' => 'required',
            'subject' => ['required', Rule::unique('news', 'subject')],
            'description' => 'required',
            'location' => 'required',
            'tags' => 'required',
            'email' => ['required', 'email'],
            'website' => 'required',
        ]);
        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('news_logo', 'public');
        }
        $formFields['user_id'] = auth()->id();
        $news_create = News::create($formFields);
        return redirect('/news')->with('message', 'News created sucessfully! ');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $single_news)
    {
        // dd($single_news);
        $data = [
            'heading' => 'Heading Title',
            'data' => $single_news
        ];
        return view('news.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $single_news)
    {
        // dd($single_news);
        $data = [
            'heading' => 'Heading Title',
            'data' => $single_news
        ];
        return view('news.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $single_news)
    {

        // Make sure login user is the owner
        if (auth()->id() != $single_news->user_id) {
            abort('403', 'Unauthorized access');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'subject' => ['required'],
            'description' => 'required',
            'location' => 'required',
            'tags' => 'required',
            'email' => ['required', 'email'],
            'website' => 'required',
        ]);
        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('news_logo', 'public');
        }
        $formFields['user_id'] = auth()->id();

        $news_update = $single_news->update($formFields);
        return redirect('/news/' . $single_news->id)->with('message', 'News updated sucessfully! ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $single_news)
    {

        // Make sure login user is the owner
        if (auth()->id() != $single_news->user_id) {
            abort('403', 'Unauthorized access');
        }
        //
        $title =  $single_news->title;
        $single_news->delete();
        return redirect('/news')->with('message', 'News "' . $title . '" delete sucessfully! ');
    }

    /**
     * 
     */
    public function manage()
    {
        // dd(auth()->id());
        // dd(User::find(auth()->user()->id)->news());
        $data = [
            'data' => User::find(auth()->id())->news
        ];
        return view('news.manage', $data);
    }
}
