<?php

namespace App\DataTables;

use App\Models\Member;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class MemberDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('id', function ($row) {
                static $index = 0;
                return (++$index) + (request()->get('start') ?? 0);
            })
            ->addColumn('name', function ($row) {
                return $row->name ?? '';
            })
            ->addColumn('phone', function ($row) {
                return $row->phone ?? '';
            })
            ->addColumn('address', function ($row) {
                return $row->address ?? '';
            })
            ->addColumn('status', function ($row) {
                $status = '';
                if ($row->status == 0) {
                    $status .= '<span class="badge badge-success bg-success">Active</span>';
                } else {
                    $status .= '<span class="badge badge-danger bg-danger">Inactive</span>';
                }
                return $status ?? '';
            })
            ->addColumn('image', function ($row) {
                $span = '<span><img style="width: 150px;" src="' . asset('storage/member/' . $row->image) . '"></span>';
                return  $span;
            })
            ->addColumn('action', function ($row) {
                return '
                    <a href="javascript:;" onclick="status(' . $row->id . ')">
                        <i class="edit-member-btn hp-text-color-dark-0 ri-2x ri-arrow-left-right-fill"></i>
                    </a>
                    <a href="javascript:;" onclick="edit(' . $row->id . ')">
                        <i class="edit-member-btn hp-text-color-dark-0 ri-2x ri-file-edit-line"></i>
                    </a>
                    <a href="javascript:void(0);" onclick="destroy(' . $row->id . ')">
                        <i class="delete-member-btn iconly-Light-Delete hp-cursor-pointer hp-transition hp-hover-text-color-danger-1 text-black-80"></i>
                    </a>
                ';
            })
            ->rawColumns(['thumbnail', 'image', 'action', 'status']) // Allow HTML rendering
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Member $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('freepikproduct-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->selectStyleSingle()
            ->parameters([
                'lengthMenu' => [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]], // Page length options
                'pageLength' => 10,
            ])
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

            Column::make('id')->title('ID'),
            Column::make('name'),
            Column::make('username'),
            Column::make('show_password'),
            Column::make('designation'),
            Column::make('phone'),
            Column::make('email'),
            Column::make('address'),
            Column::make('image'),
            Column::make('status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Member_' . date('YmdHis');
    }
}
