<?php

namespace App\Http\Controllers;

use App\Country;
use App\Http\Resources\UserResource;
use App\User;

class MainController extends Controller
{
    /**
     * Show all users for the given country.
     *
     * @param  string  $country
     * @return UserResource
     */
    public function showUsers($country)
    {
        $country = Country::where('name', $country)->firstOrFail();
        $users = User::whereHas('companies', function($q) use ($country){
            $q->where('country_id', $country->id);
         })->get();
        return UserResource::collection($users);
    }
}
