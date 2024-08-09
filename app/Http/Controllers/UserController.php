<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request) {
            $sql = trim($request->get('buscarTexto'));
            $usuarios = DB::table('users')
                ->join('roles', 'users.idrol', '=', 'roles.id')
                ->select('users.id', 'users.name', 'users.usuario', 'users.email', 'users.idrol', 'roles.nombre as rol')
                ->where('users.name', 'LIKE', '%' . $sql . '%')
                ->orderBy('users.id', 'desc')
                ->paginate(6);

            $roles = DB::table('roles')
                ->select('id', 'nombre', 'descripcion')
                ->where('condicion', '=', '1')->get();

            return view('user.index', ["usuarios" => $usuarios, "roles" => $roles, "buscarTexto" => $sql]);
        }
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->usuario = $request->usuario;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->idrol = $request->idrol;

        $user->save();
        return Redirect::to("user");
    }

    public function update(Request $request)
    {
        $user = User::findOrFail($request->id_usuario);
        $user->name = $request->name;
        $user->usuario = $request->usuario;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->idrol = $request->idrol;

        $user->save();
        return Redirect::to("user");
    }

    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->id_usuario);

        $user->delete();

        return Redirect::to("user");
    }
}
