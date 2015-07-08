<?php namespace Starter\Http\Controllers;

class StaticController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Page Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the static "pages"
	|
	*/

    public function about()
    {
        return view('static.about')->withTitle('About');
    }

    public function contact()
    {
        return view('static.contact')->withTitle('Contact');
    }

}
