<?php

namespace App\DataTables;

use App\Models\Category;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CategoryDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query) {
        return datatables()
            ->eloquent($query)
            ->addColumn('show', function ($category) {
                return '<a href="' . route('categories.show', $category->id) . '" class="btn btn-xs btn-info btn-block" target="_blank">Voir</a>';
            })
            ->addColumn('edit', function ($category) {
                return '<a href="' . route('categories.edit', $category->id) . '" class="btn btn-xs btn-warning btn-block">Modifier</a>';
            })
            ->addColumn('destroy', function ($category) {
                return '<a href="' . route('categories.destroy.alert', $category->id) . '" class="btn btn-xs btn-danger btn-block">Supprimer</a>';
            })
            ->editColumn('category_id', function ($category) {
                return ($category->category_id != null) ? Category::find($category->category_id)->name : '';
            })
            ->rawColumns(['show', 'edit', 'destroy', 'category_id']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Category $category
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Category $category)
    {
        return $category->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html() {
        return $this->builder()
            ->setTableId('categories-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Blfrtip')
            ->orderBy(1)
            ->lengthMenu()
            ->language('//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json');
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns() {
        return [
            Column::make('id'),
            Column::make('name')->title('Nom'),
            Column::make('category_id')
                ->title('Catégorie parent'),
            Column::computed('show')
                ->title('')
                ->width(60)
                ->addClass('text-center'),
            Column::computed('edit')
                ->title('')
                ->width(60)
                ->addClass('text-center'),
            Column::computed('destroy')
                ->title('')
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Category_' . date('YmdHis');
    }
}
