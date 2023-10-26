<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        $data = Dataset::where('id_user', 1)->get();
        if($request->has('search')){
            $data = Dataset::where('id_user', 1)->where('nama_data', 'LIKE', '%' . $request->query('search') . '%')->get();
        }


        return view('pages.user.dataset', compact('data'));
    }
}
