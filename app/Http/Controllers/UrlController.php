<?php

namespace App\Http\Controllers;

use App\URL;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UrlController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ["except" => ["check", "short", "store"]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $urls = auth()->user()->urls;
        return view('url.index', compact('urls'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $originUrl = $request->get('origin_url');

        $rollingCurl = new \RollingCurl\RollingCurl();
        $rollingCurl->get($originUrl);

        $info = null;

        // Convert https to http to be able to check with rolling curl
        $exp = explode(":", $originUrl);
        if ($exp[0] == "https") {
            $originUrl = "http" . substr($originUrl, 5);
        }

        $rollingCurl->setCallback(function (\RollingCurl\Request $request, \RollingCurl\RollingCurl $rollingCurl) use (&$info) {
            $info = $request->getResponseInfo();
        })->execute();


        if ($info['http_code'] == 200) {

            // If user entered desired name, try to save with it
            if ($request->get("desired_name") != "") {
                $name = $request->get("desired_name");
                if (URL::where("short_url", "LIKE", $name)->count() != 0) {
                    return view('dashboard', ["message" => "That short name is busy, try another please or use random one"])
                        ->with("old_url", $request->get('origin_url'))
                        ->with("old_name", $name);
                }
            }
            else {
                $name = str_random(10);
                while ($urls = URL::where("short_url", "LIKE", $name)->count() != 0) {
                    $name = str_random(10);
                }
            }

            $user_id = null;

            if(auth()->check()){
                $user_id = auth()->user()->id;
            }

            $url = URL::create([
                "origin_url" => $originUrl,
                "short_url" => $name,
                "user_id" => $user_id
            ]);

            return redirect()->route('url.show', $url->id);
        }
        else {
            return view('dashboard', ["message" => "Invalid url, please try again!"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $url = URL::findOrFail($id);
        return view('url.show', compact('url'));
    }

    /**
     * Redirect user to original url
     * @param $short_url
     * @return \Illuminate\Http\RedirectResponse
     */
    public function short($short_url)
    {
        $url = URL::where("short_url", "LIKE", $short_url)->first();

        // Increment link opens
        $url->opens++;
        $url->save();

        return redirect()->away($url->origin);
    }
}
