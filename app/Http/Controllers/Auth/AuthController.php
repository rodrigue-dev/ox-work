<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Connexion;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return view('auth.login');
    }

    public function loginstore(LoginRequest $loginRequest)
    {
        $connexion = Connexion::create([
            'datecreation' => date('Y-m-d h:i:s'),
            'email' => $loginRequest->request->get('email'),
            'ip' => Request::capture()->ip(),
            'status' => false,
        ]);
        $loginRequest->authenticate();
        $bool = $loginRequest->authorize();
        if ($bool) {
            $connexion->update([
                'status' => true,
            ]);
        }
        $loginRequest->session()->regenerate();
        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function register(Request $request)
    {
        if ($request->method() == "POST") {
            User::factory()->create([
                "name" => $request->get('firstname'),
                "lastname" => $request->get('lastname'),
                "phone" => $request->get('phone'),
                "adresse" => $request->get('adresse'),
                "adressepostal" => $request->get('adressepostal'),
                "commune" => $request->get('commune'),
                "email" => $request->get('email'),
                "role" => "ROLE_USER",
                'password' => bcrypt($request->get('password')),
            ]);
            return redirect('login');
        }
        return view('auth.register');
    }

    public function profil(Request $request)
    {
        $user = Auth::user();
        if ($request->method() == "POST") {
            $user->update([
                "name" => $request->get('firstname'),
                "lastname" => $request->get('lastname'),
                "phone" => $request->get('phone'),
                "adresse" => $request->get('adresse'),
                "adressepostal" => $request->get('adressepostal'),
                "commune" => $request->get('commune'),
                "email" => $request->get('email'),
                // 'password' => bcrypt($request->get('password')),
            ]);
            return redirect('profil');
        }
        return view('auth.profil', ['user' => $user]);
    }

    public function changeimage(Request $request)
    {
        $user = Auth::user();
        if ($request->method() == "POST") {
            $this->validate($request, [
                'photo' => 'required|image|mimes:jpg,png,jpeg'
            ]);
            $newFilename = uniqid() . '.' . $request->photo->extension();
            $path = $request->file('photo')->storeAs(
                'public/uploads', $newFilename
            );
            $user->photo = $newFilename;
            $user->save();
            session()->flash('success', 'Image upload');
            return redirect('profil');
        }
        return view('auth.profil', ['user' => $user]);
    }

    public function changepassword(Request $request)
    {
        $user = Auth::user();
        if ($request->method() == "POST") {
            // Here we will attempt to reset the user's password. If it is successful we
            // will update the password on an actual user model and persist it to the
            // database. Otherwise we will parse the error and return the response.
            /*$status = Password::reset(
                ['email' => $user->email,
                    'password' => $request->get('password'),
                    'token' => $request->get('token')],
                function ($user) use ($request) {
                    $user->forceFill([
                        'password' => Hash::make($request->password),
                        'remember_token' => Str::random(60),
                    ])->save();

                    event(new PasswordReset($user));
                }
            );*/
            $status= $user->update([
                 'password' => bcrypt($request->get('password')),
             ]);
            $data_ = array('name'=>$user->name,'content'=>['message'=>'Votre mot de passe a ete change. voici votre nouveau mot de passe:
            ','newpassword'=>$request->get('password')]);
            Mail::send(['text'=>'mail'], $data_, function($message) use ($user) {
                $message->to($user->email, $user->name)->subject
                ('Changement de mot de passe');
                $message->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
            });
            return $status
                ? redirect()->route('profil')->with('status', __($status))
                : back()->withInput($request->only('email'))
                    ->withErrors(['email' => __($status)]);
            //return redirect('profil');

        }
        return view('auth.profil', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function reset_password(Request $request)
    {
        if ($request->method() == "POST") {
            $user = User::query()->where('email', '=', $request->get('email'))->first();
            if (is_null($user)) {
                return redirect()->route('reset_password', [])->withErrors(__('Utilisateur inexistant', ['name' => __('users.store')]));
            }
            $password = uniqid();

            $data = array('name' => $user->name, 'password' => $password);

            Mail::send(['text' => 'ressetpassword'], $data, function ($message) use ($user) {
                $message->to($user->email, $user->name)->subject
                ('Mot de passe recuperé');
                $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            });
            $user->update([
                'password' => bcrypt($password)
            ]);
            return redirect()->route('reset_password', [])->withSuccess(__('Mot de passe', ['name' => __('users.store')]));
        }
        return view('auth.reset_password');
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

        return redirect('/');
    }
}
