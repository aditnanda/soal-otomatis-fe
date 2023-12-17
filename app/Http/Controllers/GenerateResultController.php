<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use DataTables;

class GenerateResultController extends Controller
{

    public function generate_result(Request $request){
        $data = $this->getData();

        if ($request->ajax()) {
            $repositories = Cache::get('generate_result',function() use($data) {
                $result = Http::withToken(\Session::get('jwt'))->get($data['base_url'].'api/generate-results')->json();

                return $result['generate_results'];
            });

            $data2 = new Collection($repositories);

            return Datatables::of($data2)->addIndexColumn()
                ->addColumn('action', function($row){
                    // $btn = '<a href="'.route('generate_result.edit',['id' => \Crypt::encrypt($row)]).'" class="btn btn-warning btn-sm">Edit</a>';
                    // $btn = $btn.'<a href="'.route('generate_result.delete',['id' => \Crypt::encrypt($row)]).'" class="btn btn-danger btn-sm"  onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini, tindakan ini menghapus data dan tidak dapat DIBATALKAN?\')">Hapus</a>';
                    $btn = '<div class="btn-group">
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Aksi
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="'.route('generate_result.detail',['id' => \Crypt::encrypt($row['id'])]).'">Detail</a>
                          <a class="dropdown-item" href="'.route('generate_result.delete',['id' => \Crypt::encrypt($row['id'])]).'" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini, tindakan ini menghapus data dan tidak dapat DIBATALKAN?\')">Hapus</a>
                        </div>
                      </div>';
                    return $btn;
                })

                ->rawColumns([])
                ->make(true);
        }

        return view('generate_result.index',$data);
    }

    public function generate_result_delete(Request $request,$id){
        $data = $this->getData();

        try {
            //code...
            $id = \Crypt::decrypt($id);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back();
        }

        $result = Http::withToken(\Session::get('jwt'))->delete($data['base_url'].'api/generate-results/'.$id)->json();

        if ($result['status'] == false) {
            # code...

            return redirect()->back()->with('status_danger',$result['message'].', '.@$result['errors'])->withInput();

        }


        return redirect()->back()->with('status',$result['message'])->withInput();

    }


    public function generate_result_add(Request $request){
        $data = $this->getData();

        $data['generate_result'] = [];

        $data['tipe'] = 'add';

        return view('generate_result.add_edit',$data);


    }


    public function generate_result_store(Request $request){

        $data = $this->getData();

        $result = Http::withToken(\Session::get('jwt'))->post($data['base_url'].'api/generate-results', $request->except(['_token','_method']))->json();

        if ($result['status'] == false) {
            # code...

            return redirect()->back()->with('status_danger',$result['message'].', '.@$result['errors'])->withInput();

        }

        return redirect('generate_result')->with('status',$result['message'])->withInput();
    }


    public function generate_result_detail(Request $request,$id){
        $data = $this->getData();

        try {
            //code...
            $id = \Crypt::decrypt($id);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back();
        }


        $result = Http::withToken(\Session::get('jwt'))->get($data['base_url'].'api/generate-results/'.$id)->json();

        $data['generate_result'] = $result['generate_results'];
        $data['id'] = $id;

        if ($request->ajax()) {
            $repositories = $result['generate_results']['questions'];

            $data2 = new Collection($repositories);

            return Datatables::of($data2)->addIndexColumn()
            ->addColumn('jawaban', function($row){
                // $btn = '<a href="'.route('generate_result.edit',['id' => \Crypt::encrypt($row)]).'" class="btn btn-warning btn-sm">Edit</a>';
                // $btn = $btn.'<a href="'.route('generate_result.delete',['id' => \Crypt::encrypt($row)]).'" class="btn btn-danger btn-sm"  onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini, tindakan ini menghapus data dan tidak dapat DIBATALKAN?\')">Hapus</a>';
                $btn = '<table>
                    <tr>
                        <td style="width:10%">
                        a.
                        </td>
                        <td style="width:90%">'.$row['answer_a'].'</td>
                    </tr>
                    <tr>
                        <td style="width:10%">
                        b.
                        </td>
                        <td style="width:90%">'.$row['answer_b'].'</td>
                    </tr>
                    <tr>
                        <td style="width:10%">
                        c.
                        </td>
                        <td style="width:90%">'.$row['answer_c'].'</td>
                    </tr>
                    <tr>
                        <td style="width:10%">
                        d.
                        </td>
                        <td style="width:90%">'.$row['answer_d'].'</td>
                    </tr>
                  </table>';
                return $btn;
            })

            ->rawColumns(['jawaban'])->make(true);
        }

        return view('generate_result.detail',$data);


    }

}
