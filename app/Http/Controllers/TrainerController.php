<?php

namespace App\Http\Controllers;

use App\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function store(Request $request, Trainer $trainer)
    {

        $trainer->trainers_name = $request->trainers_name;
        $trainer->trainers_username = $request->trainers_username;
        $trainer->trainers_password = $request->trainers_password;
        $trainer->trainers_email = $request->trainers_email;
        $trainer->trainers_age = $request->trainers_age;
        $img = $request->file('file');
        $img->move(public_path('/img'), $img->getClientOriginalName());
        $trainer->image = "img/" . $img->getClientOriginalName();
        $trainer->save();

        return "Radi";
    }
}
