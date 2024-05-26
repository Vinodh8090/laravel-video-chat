<?php

namespace App\Http\Controllers;

use App\Providers\InstallerServiceProvider;
use App\Providers\MembersHelperServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use JavaScript;
use Session;

class HomeController extends Controller
{
    /**
     * Homepage > Can render either login page or landing page.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function index()
    {
        if (! InstallerServiceProvider::checkIfInstalled()) {
            return Redirect::to(route('installer.install'));
        }

        JavaScript::put(['skipDefaultScrollInits' => true]);

        // If there's a custom site index
        if (getSetting('site.homepage_redirect')) {
            return redirect()->to(getSetting('site.homepage_redirect'), 301)->header('Cache-Control', 'no-store, no-cache, must-revalidate');
        }
        else {
            if (getSetting('site.homepage_type') == 'landing') {
                $featuredMembers = MembersHelperServiceProvider::getFeaturedMembers(9);
                
                // $modelProfiles = ModelsModelProfile::all(); // Fetch all model profiles
                return view('pages.home', [
                    'featuredMembers' => $featuredMembers,
                    // 'modelProfiles' => $modelProfiles, // Pass the model profiles to the view
                ]);
            } else {
                if (Auth::check()) {
                    return redirect(route('feed'));
                }
                return view('auth.login');
            }
        }
    }
}
