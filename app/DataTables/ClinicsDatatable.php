<?php

namespace App\DataTables;

use App\Models\Clinic;
use datatables;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ClinicsDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('check', function ($row) {
                return '<input type="checkbox" class="w3-check" name="ids[]" value="' . $row->clinic_id . '">';
            })
            ->addColumn('action', function ($row) {
                $html = '';
                $html .= '<a href="' .
                route("dashboard.clinics.edit", $row->clinic_id) . '"
                                class="btn btn-info btn-xs" >' . __('lang.edit') . '</a>';

                $html .= ' <a data-href="' . route("dashboard.clinics.destroy", [$row->clinic_id]) . '"
                onclick="deleteClinic(this)" class="btn-delete sw-alert btn btn-danger btn-xs">' . __('lang.delete') . '</a>';
                return $html;
            })
            ->addColumn('subcategory', function ($row) {
                return $row->subCategory->first()->name ?? '';
            })
            ->addColumn('views', function ($row) {
                return $row->getViews();
            })
            ->addColumn('is_trust', function ($row) {
                $checkbox = '<input type="checkbox" onclick="isTrust(this, ' . $row->clinic_id . ')"  name="is_trust" value="' . $row->is_trust . '" class="w3-check">';
                if ($row->is_trust == 1) {
                    $checkbox = '<input type="checkbox" onclick="isTrust(this, ' . $row->clinic_id . ')"  name="is_trust" value="' . $row->is_trust . '" class="w3-check" checked>';
                }
                return $checkbox;
            })
            ->filterColumn('subcategory', function ($query, $keyword) {
                $query->orWhere('subcategories.name', 'LIKE', "%{$keyword}%");
            })

            ->rawColumns(['action', 'image', 'subcategory', 'check', 'is_trust']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ClinicsDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Clinic $model)
    {
        $query = Clinic::query()
            ->join('clinic_subcategories', 'clinic_subcategories.clinic_id', '=', 'clinics.clinic_id')
            ->join('subcategories', 'subcategories.id', '=', 'clinic_subcategories.subcategory_id')
            ->select(
                'clinics.*',
                'clinic_subcategories.subcategory_id',
                'subcategories.name as subcategory'
            );

        if ($subcategoryId = request('subcategoryId')) {
            $query->where('clinic_subcategories.subcategory_id', $subcategoryId);
        }

        if ($isTrust = request('isTrust')) {
            if ($isTrust == 'trusted') {
                $query->where('clinics.is_trust', 1);
            } else {
                $query->where('clinics.is_trust', 0);
            }

        }

        return $query;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $url = url('/dashboard/clinics');
        $url = str_replace("http", "https", $url);
        return $this->builder()
            ->setTableId('clinicsdatatable')
            ->columns($this->getColumns())
            ->minifiedAjax($url);
        // ->dom('Bfrtip')
        // ->orderBy(1)
        // ->buttons(
        //     Button::make('create'),
        //     Button::make('export'),
        //     Button::make('print'),
        //     Button::make('reset'),
        //     Button::make('reload')
        // );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [

            'check' => [
                'title' => '<input type="checkbox" class="w3-check" id="all">',
                'orderable' => false,
            ],

            'clinic_id' => [
                'title' => __('lang.clinic_id'),
                'data' => "clinic_id",
                'defaultContent' => '-',
            ],

            'title' => [
                'title' => __('lang.title'),
                'data' => "title",
                'defaultContent' => '-',
            ],

            'description' => [
                'title' => __('lang.description'),
                'data' => "description",
                'defaultContent' => '-',
            ],

            'phone' => [
                'title' => __('lang.phone'),
                'data' => "phone",
                'defaultContent' => '-',
            ],

            'price' => [
                'title' => __('lang.price'),
                'data' => "price",
                'defaultContent' => '-',
            ],

            'subcategory' => [
                'title' => __('lang.subcategory'),
                'data' => "subcategory",
                'defaultContent' => '-',
            ],

            'views' => [
                'title' => __('lang.views'),
                'data' => "views",
                'defaultContent' => '-',
            ],

            'is_trust' => [
                'title' => __('lang.is_trust'),
            ],

            'action' => [
                'title' => __('lang.actions'),
            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Clinics_' . date('YmdHis');
    }
}
