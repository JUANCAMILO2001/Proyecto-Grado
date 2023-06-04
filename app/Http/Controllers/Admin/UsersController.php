<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;



class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('can:admin.users.index')->only('index');
        $this->middleware('can:admin.users.edit')->only('edit', 'update');
        $this->middleware('can:admin.users.create')->only('create', 'store');
        $this->middleware('can:admin.users.destroy')->only('destroy');
    }
    public function index()
    {
        $users = User::paginate(5);
        return view('admin.users.index', compact('users'));
    }


    public function create()
    {
        $states = State::all();
        return view('admin.users.create', compact('states'));
    }


    public function store(Request $request)
    {
        $users = User::create([
            'names' => $request->names,
            'lastnames' => $request->lastnames,
            'document_number' => $request->document_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'document_type' => $request->document_type,
            'state_id' => $request->state_id,

        ]);

        return redirect()->route('admin.users.index')->with('success', 'El Usuario se ha creado correctamente.');
    }

    public function show(User $user)
    {
        User::all();
        return view('admin.users.show',compact( 'user'));
    }

    public function edit(User $user)
    {
        $states = State::all();
        return view('admin.users.edit',compact('user','states'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->except('email');

        // Verificar si se proporcionó una nueva contraseña
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->names = $data['names'];
        $user->lastnames = $data['lastnames'];
        $user->phone = $data['phone'];

        $user->save();

        $user->state()->sync($request->state_id);

        return redirect()->route('admin.users.index')->with('edit', 'El Usuario se ha editado exitosamente.');

    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'El Usuario Se ha eliminado correctamente.');

    }
}
