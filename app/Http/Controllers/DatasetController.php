<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DatasetController extends Controller
{
    public function detail_dataset($user, $id){
        $data = Dataset::with(['paper', 'user'])->whereHas('user', function($query) use($user){
            $query->where('email', $user);
        })->where('id_data', $id)->first();

        
        if($data){
            $startDate = Carbon::parse($data->updated_at);
            $interval = $startDate->diffInDays(Carbon::now());

            $popular = Dataset::with('user')->orderBy('download_count', 'desc')->limit(6)->get();
            $newer = Dataset::with('user')->orderBy('created_at', 'desc')->limit(6)->get();
            return view('pages.DetailDataset', compact('data', 'interval', 'popular', 'newer'));
        }

        return redirect('/');
    }
}
