<?php

namespace App\Http\Controllers;

use App\Models\Listings;
use Auth;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class ListingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Listings::orderByDesc('created_at');
        $filters = $request->only(['priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo']);

        $query->when(
            $filters['priceFrom'] ?? false,
            fn ($query, $value) => $query->where('price', '>=', $value)
        )
            ->when(
                $filters['priceTo'] ?? false,
                fn ($query, $value) => $query->where('price', '<=', $value)
            )
            ->when(
                $filters['beds'] ?? false,
                fn ($query, $value) => $query->where('beds', (int)$value < 6 ? '=' : '>=', $value)
            )
            ->when(
                $filters['baths'] ?? false,
                fn ($query, $value) => $query->where('baths', (int)$value < 6 ? '=' : '>=', $value)
            )
            ->when(
                $filters['areaFrom'] ?? false,
                fn ($query, $value) => $query->where('baths', '>=', $value)
            )
            ->when(
                $filters['areaTo'] ?? false,
                fn ($query, $value) => $query->where('baths', '<=', $value)
            );



        return inertia(
            'Listing/Index',
            [
                "homes" => $query->paginate(12)->withQueryString(),
                "filters" => $filters
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('Listing/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user()->listings()->create(
            $request->validate([
                'beds' => 'required|integer|min:1|max:20',
                'baths' => 'required|integer|min:1|max:20',
                'area' => 'required|integer|min:20|max:1500',
                'city' => 'required',
                'code' => 'required',
                'street' => 'required',
                'street_nr' => 'required|min:1|max:10000',
                'price' => 'required|integer|min:1'
            ])
        );

        return redirect()->route('listing.index')
            ->with('success', 'Offer was created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $home = Listings::find($id);
        $this->authorize('view', $home);

        return inertia(
            'Listing/Show',
            [
                "home" => $home
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $home = Listings::find($id);
        $this->authorize('update', $home);

        return inertia(
            'Listing/Edit',
            [
                "home" => $home
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $homeToUopdate = Listings::find($id);
        $this->authorize('update', $homeToUopdate);

        $homeToUopdate->update(
            $request->validate([
                'beds' => 'required|integer|min:1|max:20',
                'baths' => 'required|integer|min:1|max:20',
                'area' => 'required|integer|min:20|max:1500',
                'city' => 'required',
                'code' => 'required',
                'street' => 'required',
                'street_nr' => 'required|min:1|max:10000',
                'price' => 'required|integer|min:1'
            ])
        );

        return redirect()->route('listing.index')
            ->with('success', 'Offer was changed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $homeToDelete = Listings::find($id);
        $this->authorize('delete', $homeToDelete);

        $homeToDelete->delete();
        return redirect()->back()
            ->with('success', 'Offer was deleted!');
    }
}
