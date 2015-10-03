<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use Auth;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OptionsController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
		$user = Auth::user();
		$emailNotifications = $user->notify;

		return view('options.index', compact('emailNotifications', 'user'));
    }

    /**
     * Enable or disable getting e-mail notifications
     *
     */
	public function toggleNotify()
	{
		$user = Auth::user();

		$user->notify = $user->notify == 1 ? 0 : 1;
		$user->save();

		return redirect()->route('options.index');
	}

    /**
     * Show form for changing user e-mail address
     *
     */
	public function editEmail()
	{
		$user = Auth::user();

		return view('options.email', compact('user'));
	}

    /**
     * Change user's e-mail address
     *
     */
	public function updateEmail(Request $request)
	{
		$this->validate($request, [
            'email' => 'required|confirmed|email|max:255|unique:users',
			]);

		return redirect()->route('options.index')
			->with(['message' => 'Your settings are saved.', 'status' => 'success']);
	}

    /**
     * Show form for changing user's password
     *
     */
	public function editPassword()
	{
		$user = Auth::user();

		return view('options.password', compact('user'));
	}

    /**
     * Store user's new password
     *
     * TODO: abstract validation
     * TODO: extract to the model
     */
	public function updatePassword(Request $request)
	{
		$this->validate($request, [
            'password' => 'required|confirmed|min:6',
			]);

		$user = Auth::user();
		$user->password = Hash::make($request->password);
		$user->save();

        return redirect()->route('options.index')
            ->with(['message' => 'Your setting are saved.', 'status' => 'success']);
	}

    /**
     * Show page with account delete confirmation
     *
     */
	public function confirmDelete()
	{
		$user = Auth::user();

		return view('options.delete', compact('user'));
	}

    /**
     * Destroy user's account
     *
     */
	public function deleteAccount()
	{
		$user = Auth::user();
		$user->delete();

        return redirect()->route('auth.showLogin')
            ->with(['message' => 'Account deleted.', 'status' => 'info']);
	}
}
