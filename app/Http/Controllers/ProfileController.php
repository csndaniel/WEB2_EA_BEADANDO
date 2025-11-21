<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        // ide jön majd a módosítási logika
    }

    public function destroy(Request $request)
    {
        // ide jön majd a profil törlés logika
    }
}
