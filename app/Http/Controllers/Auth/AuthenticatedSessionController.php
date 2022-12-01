<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Mongo\CompanyProfile;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
//        $data = CompanyProfile::query()->get();
//        dd($data);
//
//        $client = new \MongoDB\Client(
//            'mongodb://root:root@mongodb/?authSource=admin&readPreference=primary&appname=MongoDB%20Compass&ssl=false'
//        );
//
//        $collection = $client->laravel9_mongo_db->mongodb_company_profile;
//        $insertOneResult = $collection->insertOne([
//            'username' => 'admin',
//            'email' => 'admin@example.com',
//            'name' => 'Admin User',
//        ]);
//
//        printf("Inserted %d document(s)\n", $insertOneResult->getInsertedCount());
//
//        var_dump($insertOneResult->getInsertedId());
//dd($collection);
//        $document = $collection->findOne(['_id' => '635a43b88e5640d3cef98ec8']);
//        dd($document);
     //   phpinfo();

        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param \App\Http\Requests\Auth\LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
