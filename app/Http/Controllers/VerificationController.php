<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class VerificationController extends Controller
{
    public function verify($id, $hash)
    {
        $user = User::findOrFail($id);

        // Validasi hash email
        if (! hash_equals($hash, sha1($user->getEmailForVerification()))) {
            throw new ValidationException(__('The verification link is invalid.'));
        }

        // Tandai email sebagai terverifikasi
        $user->markEmailAsVerified();

        return redirect()->route('admin.dashboard')->with('status', 'Email verified successfully.');
    }
}
