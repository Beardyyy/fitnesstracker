<?php

namespace App\Http\Controllers;

use App\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{



    /*
     *
     * Storing a new trainer
     */
    public function store(Request $request, Trainer $trainer)
    {


        $request->validate([
            'trainers_name' => 'required|string',
            'trainers_username' => 'required|string',
            'trainers_password' => 'required',
            'trainers_email' => 'required|email',
            'trainers_age' => 'required',
            'file' => 'image'
        ]);

        $trainer->trainers_name = $request->trainers_name;
        $trainer->trainers_username = $request->trainers_username;
        $trainer->trainers_password = $request->trainers_password;
        $trainer->trainers_email = $request->trainers_email;
        $trainer->trainers_age = $request->trainers_age;
        $img = $request->file('trainers_image');
        $img->move(public_path('/img'), $img->getClientOriginalName());
        $trainer->Trainers_image = "img/" . $img->getClientOriginalName();
        $trainer->save();


        return $trainer;


    }
}
