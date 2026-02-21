<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    //

     public function index(Request $request) {
        $query = User::with(['details', 'location']);

        if ($request->has('gender')) {
            $query->whereHas('details', fn($q) => $q->where('gender', $request->gender));
        }

        if ($request->has('city')) {
            $query->whereHas('location', fn($q) => $q->where('city', $request->city));
        }

        if ($request->has('country')) {
            $query->whereHas('location', fn($q) => $q->where('country', $request->country));
        }

        $limit = $request->get('limit', 10);
        $users = $query->limit($limit)->get();

        // Optional: Select specific fields
        if ($request->has('fields')) {
            $fields = explode(',', $request->fields);
            return $users->map(fn($user) => collect($user)->only($fields));
        }

        return $users;
    }

}
