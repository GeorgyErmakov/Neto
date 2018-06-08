<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\DB;
use TwigBridge\Facade\Twig;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Questions;

class AdminController extends Controller
{


public function showAllAdmin() {

	 $params = array(
    'subjects' => Questions::getSubjects(),
    'authuser' => Auth::id(),
    'quanda' => Questions::getQuestion(),
    'authors' => Questions::getAuthors(),
            );
	 var_dump(Auth::id());
    //Twig::addExtension('TwigBridge\Extension\Loader\Functions');
    return Twig::render('./admin.twig', $params);


    }
}
