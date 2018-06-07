<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use TwigBridge\Facade\Twig;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Question;
use App\Answer;
use App\Author;
use App\Subject;


class TestController extends Controller
{
    public function runTest() {

    echo "Автор: ".Question::find(1)->author."<br> Ответ: ".Question::find(1)->answer."<br> Тема: ".Question::find(1)->subject ;
    }
}
