<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Country::all());
        return view('country.index', [
            'countries' => Country::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $continents = [
            "Asia",
            "Africa",
            "North America",
            "South America",
            "Antarctica",
            "Europe",
            "Australia",
        ];
        return view('country.create', [
            'continents' => $continents
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'capital' => ['required', 'string'],
            'currency' => ['required', 'string'],
            'continent' => ['required', 'string'],
        ]);

        // $country_obj = new Country();
        // $country_obj->name = $request->name;
        // $country_obj->capital = $request->capital;
        // $country_obj->currency = $request->currency;
        // $country_obj->continent = $request->continent;
        // if($country_obj->save()) {
        //     die('Created');
        // } else {
        //     die('Failed');
        // }

        // $data = [
        //     'name' => $request->name,
        //     'capital' => $request->capital,
        //     'currency' => $request->currency,
        //     'continent' => $request->continent,
        // ];

        // if (Country::create($data)) {
        //     die('Created');
        // } else {
        //     die('Failed');
        // }

        if (Country::create($request->all())) {
            return redirect()->back()->with(['success' => 'Magic has been spelled!']);
        } else {
            return redirect()->back()->with(['failure' => 'Magic has failed to spell!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country)
    {
        $continents = [
            "Asia",
            "Africa",
            "North America",
            "South America",
            "Antarctica",
            "Europe",
            "Australia",
        ];
        return view('country.edit', [
            'continents' => $continents,
            'country' => $country,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Country $country)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'capital' => ['required', 'string'],
            'currency' => ['required', 'string'],
            'continent' => ['required', 'string'],
        ]);

        if ($country->update($request->all())) {
            return redirect()->back()->with(['success' => 'Magic has been spelled!']);
        } else {
            return redirect()->back()->with(['failure' => 'Magic has failed to spell!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        if ($country->delete()) {
            return redirect()->back()->with(['success' => 'Magic has been spelled!']);
        } else {
            return redirect()->back()->with(['failure' => 'Magic has failed to spell!']);
        }
    }
}
