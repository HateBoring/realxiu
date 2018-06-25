<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends CommonController
{

    public function index()
    {
       return view('Home/User/index');
    }

    public function collection()
    {
        return view('Home/User/collection');
    }

    public function myarticle()
    {
        return view('Home/User/myarticle');
    }
    public function addarticle(){
        return view('Home/User/addarticle');
    }
    public function record()
    {
        return view('Home/User/record');
    }
    public function create()
    {

    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
