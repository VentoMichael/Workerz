<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function storeNewsletterEmail(){
        request()->validate([
            'newsletter' => 'email',
        ]);
        //return Redirect::to(URL::previous() . "#createMsg")->with('success', 'Votre message a été envoyé avec succès.
        //Nous vous contacterons bientôt !');
        return request('newsletter');
    }
}
