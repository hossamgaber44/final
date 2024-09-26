<?php

namespace App\Http\Controllers\doctore;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;


class doctoreDashboardController extends Controller
{
    public function index(){
        $data['student']=User::all();
        return view('doctore.student')->with($data);
    }

    public function deleteStudent($id){
        User::findOrFail($id)->delete();
        return back();
    }

}
