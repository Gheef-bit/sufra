<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Indikator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $indikator = Indikator::all();
        $users = User::all();
        return view('user_form', ['indikator' => $indikator], ['users' => $users]);
    }

    public function insertOrUpdate(Request $request)
    {
        $request->validate([
            'tim' => 'required|integer',
            'nama_tim' => 'required|string',
            'username' => 'required|string',
            'password' => 'required|string',
            'topik' => 'required|string',
            'judul' => 'required|array',
            'judul.*' => 'required|string',
            'keterangan' => 'required|array',
            'keterangan.*' => 'required|string',
        ]);

        $existingUser = User::where('tim', $request->tim)
            ->where('username', $request->username)
            ->where('password_asli', $request->password)
            ->first();

        if ($existingUser) {
            return redirect()->back()->with('error', 'Data sudah ada di database.');
        } else {
            $user = User::create([
                'tim' => $request->tim,
                'nama_tim' => $request->nama_tim,
                'username' => $request->username,
                'password_asli' => $request->password,
                'password' => Hash::make($request->password),
                'topik' => $request->topik,
                'role' => 'User'
            ]);

            foreach ($request->judul as $index => $judul) {
                $keterangan = $request->keterangan[$index] ?? '';
                $sasaran = $request->sasaran[$index] ?? '';
                if (!empty($judul)) {
                    Indikator::create([
                        'user_id' => $user->id,
                        'tim' => $request->tim,
                        'judul' => $judul,
                        'keterangan' => $keterangan,
                        'sasaran' => $sasaran
                    ]);
                }
            }

            return redirect('/fraa');
        }
    }
}
