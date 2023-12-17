<?php

namespace App\DataTables;

use Livewire\Livewire;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class KritikSaranDatatable extends DataTable
{
    public $result;
    public function __construct($result)
    {
        $this->result = $result;
    }
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $data['base_url']= env('API_GATEWAY').'';

        return datatables()
            ->of($this->result)
            ->editColumn('tipe', function($row){
                return $row['tipe_report'];
            })
            ->editColumn('deskripsi', function($row){
                return $row['deskripsi_report'];
            })
            ->editColumn('foto', function($row) use ($data) {
                return '<center><img src="'.$data['base_url'].$row['gambar_report'].'" height="240px;"/></center>';
            })
            ->editColumn('tanggal', function($row) {
                return date('d-m-Y H:i:s',strtotime($row['created_at']));
            })
            ->addColumn('aksi', function($row){
                return Livewire::mount('kritik-saran', ['row' => $row])->html();
            })
            ->rawColumns(['aksi','foto']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\UsersDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    // public function query(UsersDataTable $model)
    // {
    //     return $model->newQuery();
    // }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->drawCallbackWithLivewire() // enable livewire integration
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            // 'Nama Pengguna',
            'tipe',
            'deskripsi',
            'foto',
            'tanggal',
            'aksi'
        ];
    }
}
