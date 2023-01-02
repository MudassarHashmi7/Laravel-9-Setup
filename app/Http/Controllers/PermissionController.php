<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    //
    public function index()
    {
        $permissions = Permission::all();
        return view('permission.index', ['permissions'=> $permissions]);
    }


    public function create(Request $request)
    {

        $permission = new Permission();
        $permission->name = $request->name;
        $permission->save();

        return redirect(route('permission.index'))->with('success','Permission Added Successfully!');
    }



    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('permission.edit',['permission' => $permission]);
    }



    public function update(Request $request, $id)
    {
        $permission = Permission::find($id);
        $input = $request->all();
        $permission->update($input);
        return redirect(route('permission.index'))->with('success','Permission Updated Successfully!');
    }

    public function destroy($id)
    {

        Permission::destroy($id);
        return redirect(route('permission.index'))->with('success','Permission Deleted Successfully!');
    }

}
