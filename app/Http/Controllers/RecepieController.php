<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recepie;

class RecepieController extends Controller
{
    /**
     * List of resource
     *
     * @return \App\Recepie
     */
    public function index(Request $request, Recepie $recepie)
    {
        return $recepie->paginate($request['count']);
    }

    /**
     * List of resource
     *
     * @return \App\Recepie
     */
    public function search($query)
    {
        return Recepie::search($query)->get();
    }


    /**
     * Store a newly created file on resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Recepie
     */
    public function store(Request $request)
    {
        return Recepie::create($request->all());
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \App\Recepie
     */
    public function show($id)
    {
        return Recepie::find((int)$id);
    }
}
