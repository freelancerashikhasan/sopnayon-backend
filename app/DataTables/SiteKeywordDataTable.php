<?php

namespace App\DataTables;

use App\Models\ExpenseCategory;
use App\Models\Member;
use App\Models\Product;
use App\Models\SiteKeyword;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class SiteKeywordDataTable extends DataTable
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
                return $row->id;
            })
            ->addColumn('keyword', function ($row) {
                return $row->keyword ?? '';
            })
            ->addColumn('en', function ($row) {
                return $row->en ?? '';
            })
            ->addColumn('bn', function ($row) {
                return $row->bn ?? '';
            })

            ->addColumn('action', function ($row) {
                return '
                    <a href="javascript:;" onclick="edit(' . $row->id . ')">
                        <i class="edit-member-btn hp-text-color-dark-0 ri-2x ri-file-edit-line"></i>
                    </a>
                    <a href="javascript:void(0);" onclick="destroy(' . $row->id . ')">
                        <i class="delete-member-btn iconly-Light-Delete hp-cursor-pointer hp-transition hp-hover-text-color-danger-1 text-black-80"></i>
                    </a>
                ';
            })
            ->rawColumns(['thumbnail', 'image', 'action']) // Allow HTML rendering
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(SiteKeyword $model): QueryBuilder
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
            Column::make('keyword'),
            Column::make('en'),
            Column::make('bn'),

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
        return 'SiteKeywird_' . date('YmdHis');
    }
}
