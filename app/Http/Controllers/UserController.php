<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Department;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;
use function PHPUnit\Framework\exactly;

class UserController extends Controller
{
    public function profile(): Response
    {
        $user = Auth::user();
        if ($user === null) {
            redirect('/login');
            exit;
        }

        $jobs = Job::all();
        $departments = Department::all();
        $countries = Country::all();

        return Inertia::render('profile', [
            'user' => $user,
            'jobs' => $jobs,
            'departments' => $departments,
            'countries' => $countries
        ]);
    }

    public function login(): Response | RedirectResponse
    {
        $user = Auth::user();
        if (!is_null($user)) {
            redirect('profile');
            //exit;
        } else {

        }
        return Inertia::render('login');
    }

    public function save(Request $request)
    {
        $credentials = $request->validate([
            //'email' => ['required', 'email'],
            'name' => ['required', 'min:3', 'max:255'],
            'company' => ['required', 'max:255'],
            'country_id' => ['exists:App\Models\Country,id'],
            'job_id' => ['exists:App\Models\Job,id'],
        ]);

        $user = Auth::user();

        $user->update($credentials);

        return ['success' => true];
    }
}
