<?php

namespace App\DataTables;

use App\Models\Product;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductsDataTable extends DataTable
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
            ->addColumn('show', function ($product) {
                return '<a href="' . route('product.show', $product->id) . '" class="btn btn-xs btn-info btn-block" target="_blank">Voir</a>';
            })
            ->addColumn('edit', function ($product) {
                return '<a href="' . route('products.edit', $product->id) . '" class="btn btn-xs btn-warning btn-block">Modifier</a>';
            })
            ->addColumn('destroy', function ($product) {
                return '<a href="' . route('products.destroy.alert', $product->id) . '" class="btn btn-xs btn-danger btn-block">Supprimer</a>';
            })
            ->editColumn('active', function ($product) {
                return $product->active ? '<i class="fas fa-check text-success"></i>' : '';
            })
            ->editColumn('star', function ($product) {
                return $product->star ? '<i class="fas fa-check text-success"></i>' : '';
            })
            ->rawColumns(['show', 'edit', 'destroy', 'active', 'star']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Product $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Product $model) {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html() {
        return $this->builder()
            ->setTableId('products-table')
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
            Column::make('price')->title('Prix TTC'),
            Column::make('quantity')->title('Quantité'),
            Column::make('star')
                ->title('Star')
                ->width(60)
                ->addClass('text-center'),
            Column::make('active')
                ->title('Actif')
                ->width(60)
                ->addClass('text-center'),
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
        return 'Products_' . date('YmdHis');
    }
}
