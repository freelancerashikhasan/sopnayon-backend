<?php

namespace App\DataTables;

use App\Models\Member;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AccountStatementDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $cumulativeBalance = 0; // Initialize cumulative balance

        return (new EloquentDataTable($query))
            ->addColumn('id', function ($row) {
                return $row->id;
            })
            ->addColumn('account_id', function ($row) {
                return $row->account ? $row->account->name : '';
            })
            ->addColumn('category_id', function ($row) {
                if ($row->type == 'deposit') {
                    return $row->receive_category ? $row->receive_category->name : '';
                } else {
                    return $row->expense_category ? $row->expense_category->name : '';
                }
            })
            ->addColumn('member_id', function ($row) {
                return $row->member ? $row->member->name : '';
            })
            ->addColumn('debit', function ($row) {
                return $row->debit ?? '';
            })
            ->addColumn('credit', function ($row) {
                return $row->credit ?? '';
            })
            ->addColumn('date', function ($row) {
                return $row->date ?? '';
            })
            ->addColumn('balance', function ($row) use (&$cumulativeBalance) {
                // Update cumulative balance
                if ($row->debit !== null) {
                    $cumulativeBalance -= $row->debit;
                } elseif ($row->credit !== null) {
                    $cumulativeBalance += $row->credit;
                }

                return $cumulativeBalance; // Return updated balance
            })
            ->addColumn('description', function ($row) {
                return $row->description ?? '';
            })
            ->rawColumns(['thumbnail', 'image', 'action']) // Allow HTML rendering
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Transaction $model): QueryBuilder
    {
        $query = $model->whereNull('deleted_at')->orderBy('id', 'ASC');

        if (request('account_id')) {
            $query->where('account_id', request('account_id'));
        }

        if (request('type')) {
            $query->where('type', request('type'));
        }

        return $query;
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
            Column::make('type'),
            Column::make('account_id'),
            Column::make('category_id'),
            Column::make('date'),
            Column::make('description'),
            Column::make('member_id'),
            Column::make('debit'),
            Column::make('credit'),
            Column::make('balance'),
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
