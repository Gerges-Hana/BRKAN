<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{


    // public function index(Request $request)
    // {
    //     if ($request->ajax()) {
    //         return $this->getUserData();
    //     }

    //     return view('admin.users.index');
    // }

    // protected function getUserData()
    // {
    //     $data = User::latest()->get();
    //     return DataTables::of($data)
    //         ->addIndexColumn()
    //         ->addColumn('is_active', function ($row) {
    //             return $row->is_active ? 'مفعل' : 'غير مفعل';
    //         })
    //         ->addColumn('roles', function ($row) {
    //             return $row->getRoleNames()->toArray();
    //         })
    //         ->make(true);
    // }

    public function index(Request $request)
    {
        // if ($request->ajax()) {
        //     return $this->getUserData($request);
        // }
    
        return view('admin.users.index');
    }
    
    public function getUserData(Request $request)
{
    $query = User::query();

    if ($request->filled('name')) {
        $query->where('name', 'like', '%' . $request->name . '%');
    }

    if ($request->filled('username')) {
        $query->where('username', 'like', '%' . $request->username . '%');
    }

    if ($request->filled('is_active')) {
        $query->where('is_active', $request->is_active);
    }

    $data = $query->latest()->get();

    return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('is_active', function ($row) {
            return $row->is_active ? 'مفعل' : 'غير مفعل';
        })
        ->addColumn('roles', function ($row) {
            return $row->getRoleNames()->toArray();
        })
        ->make(true);
}


    public function index2(Request $request): View
    {
        $data = User::latest()->paginate(5);

        return view('admin.users.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create(): View
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            // 'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        // return $input;
        $input['password'] = FacadesHash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'تم انشاء المستخدم بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $user = User::find($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('admin.users.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'is_active' => 'required|boolean',
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        //dd( $id,$input);
        if (!empty($input['password'])) {
            $input['password'] = FacadesHash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        FacadesDB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'تم تحديث المستخدم بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'تم حذف المستخدم بنجاح ');
    }
}
