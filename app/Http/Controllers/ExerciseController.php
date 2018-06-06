<?php

namespace App\Http\Controllers;

use App\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{

    /*
     *
     * Storing new exercise
     */

    public function store(Request $request, Exercise $exercise)
    {
        $exercise->exercises_name = $request->exercises_name;
        $exercise->save();

        if($exercise) {

            return $exercise;
        }else
        {
            return "Nesto ne valja";
        }

    }



    /*
     *
     *Deleting selected exercise
     *
     */

    public function delete(Exercise $exercise)
    {

        $exercise->delete();

        return "Obrisana vezba matori";
    }


    public function edit(Request $request, Exercise $exercise)
    {

        $exercise->exercises_name = $request->exercises_name;
        $exercise->update();

        return $exercise;
    }
}
