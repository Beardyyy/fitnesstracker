<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;


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
     * Return a view for creating a new client
     * */

    public function create()
    {
        return view('post');
    }




    public function store(Request $request, Client $client)
    {
        $client->clients_name = $request->clients_name;
        $client->clients_age = $request->clients_age;
        $client->height = $request->height;
        $client->weight = $request->weight;
        $client->trainer_id = $request->trainer_id;
        $client->save();

        return $client;
    }


    /*
     *
     * This is a function that returns a testing view
     */


    public function showEdit(Client $client)
    {
        return view('edit', compact('client'));
    }



    /*
     *
     * editing a selected client
     */

    public function edit(Request $request, $id)
    {
        $client = Client::find($id);
        $client->clients_name = $request->clients_name;
        $client->clients_age = $request->clients_age;
        $client->height = $request->height;
        $client->weight = $request->weight;
        $client->trainer_id = $request->trainer_id;
        $client->update();


        return $client;
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
