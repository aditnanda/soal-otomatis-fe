<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use DataTables;

class QuestionController extends Controller
{

    public function question(Request $request){
        $data = $this->getData();

        if ($request->ajax()) {
            $repositories = Cache::get('question',function() use($data) {
                $result = Http::withToken(\Session::get('jwt'))->get($data['base_url'].'api/questions')->json();

                return $result['questions'];
            });

            $data2 = new Collection($repositories);

            return Datatables::of($data2)->addIndexColumn()
                ->addColumn('action', function($row){
                    // $btn = '<a href="'.route('question.edit',['id' => \Crypt::encrypt($row)]).'" class="btn btn-warning btn-sm">Edit</a>';
                    // $btn = $btn.'<a href="'.route('question.delete',['id' => \Crypt::encrypt($row)]).'" class="btn btn-danger btn-sm"  onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini, tindakan ini menghapus data dan tidak dapat DIBATALKAN?\')">Hapus</a>';
                    $btn = '<div class="btn-group">
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Aksi
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="'.route('question.edit',['id' => \Crypt::encrypt($row)]).'">Edit</a>
                          <a class="dropdown-item" href="'.route('question.delete',['id' => \Crypt::encrypt($row)]).'" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini, tindakan ini menghapus data dan tidak dapat DIBATALKAN?\')">Hapus</a>
                        </div>
                      </div>';
                    return $btn;
                })

                ->rawColumns([])
                ->make(true);
        }

        return view('question.index',$data);
    }

    public function question_delete(Request $request,$id){
        $data = $this->getData();

        try {
            //code...
            $id = \Crypt::decrypt($id);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back();
        }

        $result = Http::withToken(\Session::get('jwt'))->delete($data['base_url'].'api/questions/'.$id['id'])->json();

        if ($result['status'] == false) {
            # code...

            return redirect()->back()->with('status_danger',$result['message'].', '.@$result['errors'])->withInput();

        }


        return redirect()->back()->with('status',$result['message'])->withInput();

    }

    public function question_edit(Request $request,$id){
        $data = $this->getData();

        try {
            //code...
            $id = \Crypt::decrypt($id);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back();
        }


        $result = Http::withToken(\Session::get('jwt'))->get($data['base_url'].'api/questions/'.$id['id'])->json();

        $data['question'] = $result['questions'] ?? $id;

        $data['tipe'] = 'edit';

        return view('question.add_edit',$data);


    }

    public function question_add(Request $request){
        $data = $this->getData();

        $data['question'] = [];

        $data['tipe'] = 'add';

        return view('question.add_edit',$data);


    }

    public function question_update(Request $request,$id){

        $data = $this->getData();

        try {
            //code...
            $id = \Crypt::decrypt($id);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back();
        }

        $result = Http::withToken(\Session::get('jwt'))->put($data['base_url'].'api/questions/'.$id['id'], $request->except(['_token','_method']))->json();

        if ($result['status'] == false) {
            # code...

            return redirect()->back()->with('status_danger',$result['message'].', '.@$result['errors'])->withInput();

        }

        return redirect('question')->with('status',$result['message'])->withInput();
    }

    public function question_store(Request $request){

        $data = $this->getData();

        $result = Http::withToken(\Session::get('jwt'))->post($data['base_url'].'api/questions', $request->except(['_token','_method']))->json();

        if ($result['status'] == false) {
            # code...

            return redirect()->back()->with('status_danger',$result['message'].', '.@$result['errors'])->withInput();

        }

        return redirect('question')->with('status',$result['message'])->withInput();
    }



}
