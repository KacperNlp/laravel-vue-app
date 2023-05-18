<?php

namespace App\Http\Controllers;

use App\Models\Listings;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $home = Listings::find(10);
        $city = $home->city;

        return inertia(
            'Index/Index',
            [
                "message" => $city
            ]
        );
    }

    public function show()
    {
        return inertia('Index/Show');
    }
}
