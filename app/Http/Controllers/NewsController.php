<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $newsItems = [
            ['title' => 'Season 15 Patch Notes Released!', 'link' => '#'],
            ['title' => 'Top 5 Builds for ADC in Season 15', 'link' => '#'],
            ['title' => 'Atakhan Revealed', 'link' => '#'],
        ];

        return view('news.index', compact('newsItems'));
    }
}
