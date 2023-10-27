<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
        $data = Dataset::where('id_user', 1)->orderBy('created_at', 'desc')->get();
        if ($request->has('search')) {
            $data = Dataset::where('id_user', 1)->where('nama_data', 'LIKE', '%' . $request->query('search') . '%')->orderBy('created_at', 'desc')->get();
        }


        return view('pages.user.dataset', compact('data'));
    }

    public function menunggu_konfirmasi(Request $request)
    {
        $data = Dataset::with('paper')->where('id_user', 1)->where('valid', 0)->orderBy('created_at', 'desc')->paginate(10);
        if ($request->has('search')) {
            $data = Dataset::with('paper')->where('id_user', 1)->where('valid', 0)->where('nama_data', 'LIKE', '%' . $request->query('search') . '%')->orderBy('created_at', 'desc')->paginate(10);
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

                Dataset::find($kode)->delete();

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
}
