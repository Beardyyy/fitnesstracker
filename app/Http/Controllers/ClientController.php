<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class ClientController extends Controller
{



    /*
     * Returns all clients from a selected trainer
     * */

    public function index($id)
    {

        $trainer_clients = Client::where('trainer_id', '=', $id)->get();


        return $trainer_clients;
    }






    /*
     *
     *
     * Storing a new client
     */

    public function store(Request $request, Client $client)
    {

        $trainer_id = Client::where('trainer_id', $request->trainer_id)->first();

        if($trainer_id) {


            $client->clients_name = $request->clients_name;
            $client->clients_age = $request->clients_age;
            $client->height = $request->height;
            $client->weight = $request->weight;
            $client->trainer_id = $request->trainer_id;
            $client->save();

            return response()->json([$client]);

        }elseif(!$trainer_id){

            return "There is no trainer user under the specified ID";
        }
    }







    /*
     *
     * editing a selected client
     */

    public function edit(Request $request, Client $client)
    {

       // $trainer_id = Client::where('trainer_id', $request->trainer_id)->first();
/*
        if($trainer_id) {
*/
            //$client = Client::find($id);
            $client->clients_name = $request->clients_name;
            $client->clients_age = $request->clients_age;
            $client->height = $request->height;
            $client->weight = $request->weight;
            $client->trainer_id = $request->trainer_id;
            $client->save();


            return $client;
/*
        }elseif(!$trainer_id){

            return "Something went wrong! There in no trainer user under the specific ID!";

        }
*/

    }




    /*
     *
     * Deleting selected client
     *
     */

    public function delete(Client $client)
    {

        $client->delete();

        return "Obrisano matori";
    }
}
