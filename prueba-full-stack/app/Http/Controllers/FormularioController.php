<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Barryvdh\DomPDF\Facade\Pdf;

//use Inertia\Inertia;

class FormularioController extends Controller
{
    public function index()
    {
        //return Inertia::render('DefaultForm');
        return view('formulario');
    }

    public function report(Request $request)
    {
        #$users = User::all();
        $myEmail = $request->input('email');
        $myPassword = $request->input('clave');
        $myConfirmationPassword = $request->input('confirmarClave');
        $myFirstName = $request->input('name');
        $myLastName = $request->input('lastName');
        $myCompany = $request->input('company');
        $myPhoneNumber = $request->input('phone');
        $mySecurityQuestion = $request->input('securityQuestion');

        $data = [
            'email' => $myEmail, //'r8write@tech.com',
            'password' => $myPassword, //'P@ssw0rd123#R8"',
            'confirmation_password' => $myConfirmationPassword, //'P@ssw0rd123#R8',
            'first_name' => $myFirstName, //'John',        
            'last_name' => $myLastName, //'Doe',       
            'company' => $myCompany, //'R8write',       
            'phone_number' => $myPhoneNumber, //'+1234567890',       
            'security_question' => $mySecurityQuestion //'Pablito'     
        ];

        $pdf = Pdf::loadView('report', $data);
        return $pdf->download('invoice.pdf');
        #return $pdf->stream('report.pdf');
    }
}
