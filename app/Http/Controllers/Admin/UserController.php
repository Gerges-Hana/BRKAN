<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{

    public function index(Request $request): Factory|Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.users.index');
    }

    /**
     * @throws Exception
     */
    public function getUsersData(Request $request): JsonResponse
    {
        $name = strtolower($request->input('name'));
        $username = strtolower($request->input('username'));
        $is_active = filter_var($request->input('is_active'), FILTER_VALIDATE_BOOLEAN);

        $users = User::query();
        if ($request->filled('name')) {
            $users->whereRaw('LOWER(name) like ?', ['%' . $name . '%']);
        }
        if ($request->filled('username')) {
            $users->whereRaw('LOWER(username) like ?', ['%' . $username . '%']);
        }
        if ($request->filled('is_active')) {
            $users->where('is_active', $is_active);
        }

        return DataTables::of($users->with('roles'))->toJson();
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

        Session::flash('success_message', 'تم انشاء الشركه بنجاح');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
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
     * @param int $id
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
     * @param \Illuminate\Http\Request $request
     * @param int $id
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
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        Session::flash('success_message', 'تم تحديث الشركه بنجاح');
        return redirect()->route('users.index');
    }

    /**
     * Check if the user has relations before deleting it
     *
     * @param $id
     * @return JsonResponse
     */
    public function checkHasRelations($id): JsonResponse
    {
        // $role_relations_1 = DB::table("purchase_order_updates")->where("user_id", $id)->count();
        // $role_relations_2 = DB::table("purchase_order_status_updates")->where("user_id", $id)->count();
        $role_relations_1 = 0;
        $role_relations_2 = 0;

        return response()->json(['has_relations' => $role_relations_1 > 0 || $role_relations_2 > 0]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $deleted = DB::table("users")->where('id', $id)->delete();
        if ($deleted) {
            return response()->json(['success' => true, 'success_message' => 'تم حذف الشركه بنجاح!']);
        } else {
            return response()->json(['success' => false, 'error_message' => 'فشل الحذف حاول مرة اخرى!']);
        }
    }
}
