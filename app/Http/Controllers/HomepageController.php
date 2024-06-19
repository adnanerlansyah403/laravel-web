<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomepageController extends Controller
{
    public function index(){
        $articles = Article::all();

        return Inertia::render('Homepage', compact('articles'));
    }
}
