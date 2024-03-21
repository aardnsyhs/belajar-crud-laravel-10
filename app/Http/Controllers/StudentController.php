<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index(): View
    {
        $students = Student::all();
        return view('siswa.index', compact('students'));
    }

    public function create(): View
    {
        return view('siswa.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'nis' => 'required|max:9|min:9',
            'nama' => 'required|min:3',
            'no_telp' => 'required|max:13|min:10',
            'alamat' => 'required|min:5',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:500000'
        ]);

        $image = $request->file('image');
        $image->storeAs('public/siswa', $image->hashName());

        Student::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'image' => $image->hashName()
        ]);

        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id): View
    {
        $students = Student::findOrFail($id);
        return view('siswa.show', compact('students'));
    }

    public function edit(string $id): View
    {
        $students = Student::findOrFail($id);
        return view('siswa.edit', compact('students'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'nis' => 'required',
            'nama' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png|max:500000'
        ]);

        $students = Student::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/siswa', $image->hashName());

            Storage::delete('public/siswa/' . $students->image);

            $students->update([
                'nis' => $request->nis,
                'nama' => $request->nama,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat,
                'image' => $image->hashName()
            ]);
        } else {
            $students->update([
                'nis' => $request->nis,
                'nama' => $request->nama,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat
            ]);
        }

        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $students = Student::findOrFail($id);

        Storage::delete('public/siswa/' . $students->image);

        $students->delete();

        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
