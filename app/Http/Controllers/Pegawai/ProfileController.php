<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $userModel = $request->user();
        $pegawaiModel = $userModel->getPegawai();
        
        return view('pegawai.profile.index', [
            'user' => $userModel,
            'pegawai' => $pegawaiModel,
        ]);
    }

    /**
     * Update the user's profile information.
     *
     * @param  \App\Http\Requests\ProfileUpdateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $userModel = $request->user();
        $pegawaiModel = Pegawai::where(['user_id' => $userModel->id]);

        $nama_pegawai = $request->get('nama_pegawai');
        $email = $request->get('email');
        $jenis_kelamin = $request->get('jenis_kelamin');
        $alamat = $request->get('alamat');

        $updateUser = $userModel->update([
            'email' => $email,
        ]);

        $updatePegawai = $pegawaiModel->update([
            'nama_pegawai' => $nama_pegawai,
            'jenis_kelamin'=> $jenis_kelamin,
            'alamat' => $alamat,
        ]);

        return Redirect::route('pegawai.profile.index')->with('status', 'profile-updated');
    }
}
