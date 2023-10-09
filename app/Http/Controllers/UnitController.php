<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index(){
        return view('admin.unit.index',[
            'units'    => Unit::all()
        ]);
    }


    public function create(){
        return view('admin.unit.create');
    }

    public function store(Request $request){
        Unit::createNewUnit($request);

        return redirect()->route('unit.index')->with('success','Unit Added Successfully');
    }

    public function edit($id){
        return view('admin.unit.edit',[
            'unit' => Unit::find($id)
        ]);
    }

    public function update(Request $request,$id){
        Unit::updatedUnit($request,$id);

        return redirect()->route('unit.index')->with('success','Unit Updated Successfully');
    }

    public function destroy($id){
        Unit::deletedUnit($id);

        return redirect()->route('unit.index')->with('success','Unit Deleted Successfully');
    }
}
