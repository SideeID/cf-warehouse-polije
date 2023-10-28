<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use App\Models\Paper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index()
    {
        $newer = Dataset::with('user')
            ->where('valid', 1)
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        $popular = Dataset::with('user')
            ->where('valid', 1)
            ->orderBy('download_count', 'desc')
            ->limit(6)
            ->get();
            
        return view('pages.utama', compact('newer', 'popular'));
    }

    public function dataset(Request $request)
{
    $search = $request->input('search');
    $sort = $request->input('sort', 'desc');

    $query = Dataset::where('valid', 1);

    if ($search) {
        $query->where('nama_data', 'like', '%' . $search . '%');
    }

    if ($sort === 'asc') {
        $query->orderBy('created_at', 'asc');
    } elseif ($sort === 'desc') {
        $query->orderBy('created_at', 'desc');
    }

    $datasets = $query->get();

    return view('pages.dataset.index', compact('datasets'));
}



    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'judul' => 'required',
                'deskripsi' => 'required',
                'file' => 'required',
            ], [
                'required' => 'Field wajib diisi!',
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }

            $dataset = new Dataset;
            $dataset->nama_data = $request->judul;
            $dataset->deskripsi_data = $request->deskripsi;

            $file = $request->file('file');
            if ($file) {
                $nama_file = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/data/'), $nama_file);
                $dataset->file_data = $nama_file;
            }

            $dataset->download_count = 0;
            $dataset->id_user = Auth::user()->id_user;
            $dataset->valid = 0;
            $dataset->save();

            if ($request->has('nama_paper') && $request->has('jenis_paper')) {
                for ($i = 0; $i < count($request->nama_paper); $i++) {
                    Paper::create([
                        "nama_paper" => $request->nama_paper[$i],
                        "id_jenis_paper" => $request->jenis_paper[$i],
                        "id_data" => $dataset->id_data
                    ]);
                }
            }

            Alert::success('Berhasil', 'Berhasil menambahkan data');
            return redirect()->route('dataset.create');
        }
        return view('pages.dataset.create');
    }

}
