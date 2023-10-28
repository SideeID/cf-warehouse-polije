<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use App\Models\JenisPaper;
use App\Models\Paper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class DatasetController extends Controller
{
    public function detail_dataset($user, $id)
    {
        $data = Dataset::with(['paper', 'user'])->whereHas('user', function ($query) use ($user) {
            $query->where('email', $user);
        })->where('id_data', $id)->where('valid', 1)->first();


        if ($data) {
            $startDate = Carbon::parse($data->updated_at);
            $interval = $startDate->diffInDays(Carbon::now());

            $popular = Dataset::with('user')->where('valid', 1)->orderBy('download_count', 'desc')->limit(6)->get();
            $newer = Dataset::with('user')->where('valid', 1)->orderBy('created_at', 'desc')->limit(6)->get();
            return view('pages.DetailDataset', compact('data', 'interval', 'popular', 'newer'));
        }

        return redirect('/');
    }

    public function kelolah_dataset(Request $request)
    {
        // Ubah id_user 1 ke session sesuai yang login
        $data = Dataset::with('paper')->where('id_user', Auth::user()->id_user)->orderBy('created_at', 'desc')->paginate(10);
        if ($request->has('search')) {
            $data = Dataset::with('paper')->where('id_user', Auth::user()->id_user)->where('nama_data', 'LIKE', '%' . $request->query('search') . '%')->orderBy('created_at', 'desc')->paginate(10);
        }

        if ($request->has('search')) {
            $data->appends(array(
                'search' => $request->search
            ));
        }

        $jenis_paper = JenisPaper::all();


        return view('pages.user.dataset', compact('data', 'jenis_paper'));
    }

    public function menunggu_konfirmasi(Request $request)
    {
        $data = Dataset::with('paper')->where('valid', 0)->orderBy('created_at', 'desc')->paginate(10);
        if ($request->has('search')) {
            $data = Dataset::with('paper')->where('valid', 0)->where('nama_data', 'LIKE', '%' . $request->query('search') . '%')->orderBy('created_at', 'desc')->paginate(10);
        }

        if ($request->has('search')) {
            $data->appends(array(
                'search' => $request->search
            ));
        }

        return view('pages.user.admin.MenungguKonfirmasi', compact('data'));
    }

    public function tolak_dataset($kode, Request $request)
    {
        if ($request->has('token')) {
            if ($request->token === $request->session()->token()) {
                $request->session()->regenerateToken();

                $data = Dataset::find($kode);

                if (File::exists("uploads/data/" . $data->file_data)) {
                    File::delete("uploads/data/" . $data->file_data);
                }

                $data->delete();

                Alert::success('Berhasil', 'Berhasil menolak data');

                return redirect('/admin/menunggu-konfirmasi');
            } else {
                return redirect('/admin/menunggu-konfirmasi');
            }
        } else {
            return redirect('/admin/menunggu-konfirmasi');
        }
    }

    public function terima_dataset($kode, Request $request)
    {
        if ($request->has('token')) {
            if ($request->token === $request->session()->token()) {
                $request->session()->regenerateToken();

                Dataset::where('id_data', $kode)->update([
                    "valid" => 1
                ]);

                Alert::success('Berhasil', 'Berhasil mengkonfirmasi data');

                return redirect('/admin/menunggu-konfirmasi');
            } else {
                return redirect('/admin/menunggu-konfirmasi');
            }
        } else {
            return redirect('/admin/menunggu-konfirmasi');
        }
    }

    public function telah_konfirmasi(Request $request)
    {
        $data = Dataset::with('paper')->where('valid', 1)->orderBy('created_at', 'desc')->paginate(10);
        if ($request->has('search')) {
            $data = Dataset::with('paper')->where('valid', 1)->where('nama_data', 'LIKE', '%' . $request->query('search') . '%')->orderBy('created_at', 'desc')->paginate(10);
        }

        if ($request->has('search')) {
            $data->appends(array(
                'search' => $request->search
            ));
        }

        return view('pages.user.admin.TelahDikonfirmasi', compact('data'));
    }

    public function add_dataset(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' =>  'required',
            'deskripsi' => 'required',
            'file' => 'required'
        ], [
            'required' => 'Field wajib diisi!'
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Gagal menambahkan data');
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

        if($request->has('nama_paper') && $request->has('jenis_paper')){
            for ($i=0; $i < count($request->nama_paper); $i++) { 
                Paper::create([
                    "nama_paper" => $request->nama_paper[$i],
                    "id_jenis_paper" => $request->jenis_paper[$i],
                    "id_data" => $dataset->id_data
                ]);
            }
        }



        Alert::success('Berhasil', 'Berhasil menambahkan data');
        return redirect('/user/dataset');
    }

    public function update_dataset($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' =>  'required',
            'deskripsi' => 'required',
        ], [
            'required' => 'Field wajib diisi!'
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Gagal menambahkan data');
            return redirect()->back()->withErrors($validator);
        }

        if($id){
            $dataset = Dataset::find($id);
            $dataset->nama_data = $request->judul;
            $dataset->deskripsi_data = $request->deskripsi;
    
            $file = $request->file('file');
            if ($file) {
                if (File::exists("uploads/data/" . $dataset->file_data)) {
                    File::delete("uploads/data/" . $dataset->file_data);
                }

                $nama_file = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/data/'), $nama_file);
                $dataset->file_data = $nama_file;
            }
    
            $dataset->save();

            Paper::where('id_data', $dataset->id_data)->delete();
    
            if($request->has('nama_paper') && $request->has('jenis_paper')){
                for ($i=0; $i < count($request->nama_paper); $i++) { 
                    Paper::create([
                        "nama_paper" => $request->nama_paper[$i],
                        "id_jenis_paper" => $request->jenis_paper[$i],
                        "id_data" => $dataset->id_data
                    ]);
                }
            }
        }

        Alert::success('Berhasil', 'Berhasil mengubah data');
        return redirect('/user/dataset');
    }

    public function download($name, $id){
        if (File::exists("uploads/data/" . $name)) {
            $data = Dataset::find($id);
            $data->download_count = $data->download_count + 1;
            $data->save();

            return response()->download(public_path('uploads/data/' . $name));
        }

        return redirect()->back();
    }
}
