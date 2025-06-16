<?php

namespace App\DataTables;

use App\Helpers\Traits\RowIndex;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class StaffsDataTable extends DataTable
{
    use RowIndex;
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('dt_id', function ($row) {
                return $this->dt_index($row);
            })
            ->editColumn('name', function ($row) {
                return $row->name . ' (' . $row->username . ') ';
            })
            ->addColumn('roles', function ($row) {
                if (count($row->getRoleNames()) < 0) {
                    return 'No role assigned';
                } else {
                    foreach ($row->getRoleNames() as $roleName) {
                        return $roleName . '<br>';
                    }
                }
            })

            ->editColumn('created_at', function ($row) {
                return date('d M Y', strtotime($row->created_at));
            })
            ->addColumn('action', function ($row) {
                $assignRole = '<a href="' . route('staff.assing.role', $row->id) . '" class="dropdown-item" onclick="edit(' . $row->id . ')">Assign Role</a>';
                $assignPermission = '<a href="' . route('staff.assing.permission', $row->id) . '" class="dropdown-item" onclick="edit(' . $row->id . ')">Assign Permission</a>';
                $editbtn = '<a href="' . route('staff.edit', $row->id) . '" class="dropdown-item" onclick="edit(' . $row->id . ')">Edit</a>';
                $deletebtn = '<a href="javascript:;" class="dropdown-item" onclick="destroy(' . $row->id . ')">Delete</a>';
                $dropdown = '
                        <div class="dropdown bg-transparrent">
                            <button aria-expanded="false" aria-haspopup="true" class="btn btn-sm btn-success" data-bs-toggle="dropdown" id="dropdownMenuButton" type="button">Action<i class="fas fa-caret-down ms-1"></i></button>
                            <div  class="dropdown-menu bg-info shadow-lg tx-13">
                                ' . $assignRole . '
                                ' . $assignPermission . '
                                ' . $editbtn . '
                                ' . $deletebtn . '
                            </div>
                        </div>
                    ';
                return $dropdown;
            })
            ->rawColumns(['action', 'roles', 'image', 'permissions'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->where('deleted_at', null)->whereNot('id', 1)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('file-export-datatable')
            ->addTableClass('table-bordered')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('lBfrtip')
            ->pageLength(50)
            ->orderBy(0, 'asc')
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                // Button::make('pdf'),
                Button::make('print'),
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('dt_id')->addClass('bg-white text-center')->width('5%'),
            Column::make('name')->addClass('text-center'),
            Column::make('phone')->addClass('text-center'),
            Column::make('email')->addClass('text-center'),
            Column::make('show_password')->addClass('text-center'),
            Column::make('roles')->addClass('text-center'),
            Column::make('created_at')->addClass('text-center'),
            Column::computed('action')->exportable(false)->printable(false)->width(60)->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Staffs_' . date('YmdHis');
    }
}
