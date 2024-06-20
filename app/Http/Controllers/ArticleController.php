<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use \App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return Inertia::render("Article/Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            "title" => "required",
            "description" => "required",
            "thumbnail" => "nullable|image|mimes:png,jpg",
        ]);

        $article = Article::create($validateData);

        $files = ['thumbnail'];
        foreach ($files as $file) {
            if($request->hasFile($file)) {
                $filePath = $request->file($file)->store("articles/", 'public');
                $article->$file = $filePath;
            }
        }
        $article->save();

        return redirect()->route("homepage")->with("success","Artikel berhasil ditambahkan!")   ;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $article = Article::find($id);
        return Inertia::render("Article/Edit", [
            "id" => $id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            "title" => "required",
            "description" => "required",
            "thumbnail" => "nullable|image|mimes:png,jpg",
        ]);

        $article = Article::find($id);
        $article->update($validateData);

        $files = ['thumbnail'];
        foreach ($files as $file) {
            if($request->hasFile($file)) {
                $filePath = $request->file($file)->store("articles/", 'public');
                $article->$file = $filePath;
            }
        }

        $article->save();
        return redirect()->route('homepage')->with('success','Berhasil mengupdate artikel!') ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
