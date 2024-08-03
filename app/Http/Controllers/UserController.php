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
                ->select('users.id', 'users.name', 'users.email', 'users.idrol', 'roles.nombre as rol')
                ->where('users.name', 'LIKE', '%' . $sql . '%')
                ->orderBy('users.id', 'desc')
                ->paginate(6);

            /*listar los roles en ventana modal*/
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
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->idrol = $request->id_rol;

        // Manejar la carga de la imagen
        if ($request->hasFile('imagen')) {
            $filenamewithExt = $request->file('imagen')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('imagen')->guessClientExtension();
            $fileNameToStore = time() . '.' . $extension;
            $path = $request->file('imagen')->storeAs('public/img/usuario', $fileNameToStore);
        } else {
            $fileNameToStore = "noimagen.jpg";
        }

        $user->imagen = $fileNameToStore;

        $user->save();
        return Redirect::to("user");
    }

    public function update(Request $request)
    {
        $user = User::findOrFail($request->id_usuario);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->idrol = $request->id_rol;

        // Editar imagen
        if ($request->hasFile('imagen')) {
            if ($user->imagen != 'noimagen.jpg') {
                Storage::delete('public/img/usuario/' . $user->imagen);
            }

            $filenamewithExt = $request->file('imagen')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('imagen')->guessClientExtension();
            $fileNameToStore = time() . '.' . $extension;
            $path = $request->file('imagen')->storeAs('public/img/usuario', $fileNameToStore);
        } else {
            $fileNameToStore = $user->imagen;
        }

        $user->imagen = $fileNameToStore;

        $user->save();
        return Redirect::to("user");
    }

    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->id_usuario);

        // Alternar la condición del usuario
        $user->idrol = $user->idrol == '1' ? '0' : '1';
        $user->save();
        return Redirect::to("user");
    }
}
