<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::OrderBy('role_id', 'ASC')->get();
        return view('pegawai.kuptd.user', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.kuptd.create', [
            'user' => new User,
            'role' => Role::query()->where('id', '>', 1)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $image = $request->gambar ? $request->file('gambar')->store('', 'public') : 'user.png';
        User::create($request->validated() + [
            'password' => bcrypt('banjarmasin'),
            'profil' => $image,
            'role_id' => request('role')
        ]);


        notify()->success("Data Berhasil Ditambah", "Success", "topRight");
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $role = Role::query()->get();
        return view('pegawai.kuptd.edit', compact('role', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::where('id', $id)->first();
        $image = $request->profil ? $request->file('profil')->store('', 'public') : $user->profil;
        if ($request->profil) {
            if ($user->profil) {
                \Storage::delete('storage/app/public/' . $user->profil);
            }
        }

        $user->update($request->validated() + [
            'profil' => $image
        ]);

        notify()->success("Data Berhasil Diedit", "Success", "topRight");
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        notify()->success("Data Berhasil Dihapus", "Success", "topRight");
        return redirect()->route('user.index');
    }

    public function editPassword(User $user)
    {
        return view('pegawai.kuptd.password', compact('user'));
    }

    public function updatePassword(Request $request, User $user)
    {
        request()->validate([
            'password' => 'min:6|confirmed'
        ]);

        User::where('id', $user->id)
            ->update([
                'password' => bcrypt($request['password']),
            ]);
        notify()->success("Password Berhasil Diubah", "Success", "topRight");
        return redirect('/home');
    }
}
