<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    protected $linkRequestView = 'leitor.auth.passwords.email';
    protected $resetView = 'leitor.auth.passwords.reset';
    protected $emailsView = 'leitor.auth.emails.password';
    
    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateSendResetLinkEmail($request);

        $broker = $this->getBroker();

        $response = Password::broker($broker)->sendResetLink(
            $this->getSendResetLinkEmailCredentials($request),
            $this->resetEmailBuilder()
        );

        switch ($response) {
            case Password::RESET_LINK_SENT:
                \Session::flash('sucesso','O link de redefinição foi enviado ao seu email.');
                return $this->getSendResetLinkEmailSuccessResponse($response);
            case Password::INVALID_USER:
            default:
                return $this->getSendResetLinkEmailFailureResponse($response);
        }
    }
}
