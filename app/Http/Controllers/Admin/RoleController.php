<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    // function __construct()
    // {
    //      $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
    //      $this->middleware('permission:role-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.roles.index');
    }

    /**
     * Get the roles list for the datatable
     *
     * @throws Exception
     */
    public function getOrdersData(Request $request): JsonResponse
    {
        $roles = Role::query();
        $name = strtolower($request->input('name'));

        if ($request->filled('name')) {
            $roles->whereRaw('LOWER(name) like ?', ['%' . $name . '%']);
        }

        return DataTables::of($roles)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $permission = Permission::all();
        return view('admin.roles.create', compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $permission = Permission::query()->find($request->input('permission'));
        $role->givePermissionTo($permission);

        Session::flash('success_message', 'تم إضافة الدور بنجاح!');
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        $role = Role::query()->find($id);
        $rolePermissions = Permission::query()
            ->join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();

        return view('admin.roles.show', compact('role', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $role = Role::query()->find($id);
        $permission = Permission::query()->get();
        $rolePermissions = DB::table("role_has_permissions")
            ->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('admin.roles.edit', compact('role', 'permission', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::query()->find($id);
        $role->name = $request->input('name');
        $role->save();
        $role->refresh();

        $permissionsIds = $request->input('permission');
        $permissions = Permission::query()->findMany($permissionsIds);
        $role->givePermissionTo($permissions);

        session()->flash('success_message', 'تم إضافة الدور بنجاح!');
        return redirect()->route('roles.index');
    }

    /**
     * Check if the role has relations before deleting it
     *
     * @param $id
     * @return JsonResponse
     */
    public function checkHasRelations($id): JsonResponse
    {
        $role_relations = DB::table("model_has_roles")->where("role_id", $id)->count();

        return response()->json(['has_relations' => $role_relations > 0]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $deleted = DB::table("roles")->where('id', $id)->delete();
        if ($deleted) {
            return response()->json(['success' => true, 'success_message' => 'تم حذف الدور بنجاح!']);
        } else {
            return response()->json(['success' => false, 'error_message' => 'فشل الحذف حاول مرة اخرى!']);
        }
    }
}
