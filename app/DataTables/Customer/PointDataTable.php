<?php

namespace App\DataTables\Customer;

use App\Models\Admin;
use App\Models\PointTransaction;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PointDataTable extends DataTable
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
            ->addIndexColumn('DT_RowIndex')
            ->addColumn('date', function ($item) {
                return $item->created_at ?: '-';
            })
            ->addColumn('description', function ($item) {
                return $item->description ?: '-';
            })
            ->addColumn('in', function ($item) {
                return $item->in ?: '-';
            })
            ->addColumn('out', function ($item) {
                return $item->out ?: '-';
            })
            ->rawColumns(['date', 'description', 'in', 'out']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Admin\Admin $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PointTransaction $model)
    {
        return $model->localsearch(request());
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('customer-point-table')
            ->columns($this->getColumns())
            ->ajax([
                'url' => route('customer.point.index'),
                'data' => 'function(d) {
                    d.date = $("#date").val();
                    d.description = $("#description").val();
                    d.in = $("#in").val();
                    d.out = $("#out").val();
                }',
            ])
            ->dom("<'row'<'col-sm-12 table-responsive' t>><'row'<'col-lg-12' <'tw-py-3 col-lg-12 d-flex flex-column flex-sm-row align-items-center justify-content-between tw-space-y-5 md:tw-space-y-0' ip>r>>")
            ->initComplete('function() {
                    $(".datatable-input").on("change",function () {
                        $("#customer-point-table").DataTable().ajax.reload();
                    });
                    $("#subBtn").on("click",function () {
                        $("#customer-point-table").DataTable().ajax.reload();
                    });
                    $("#clearBtn").on("click",function () {
                        $("#date").val(null);
                        $("#description").val(null);
                        $("#in").val(null);
                        $("#out").val(null);
                        $("#customer-point-table").DataTable().ajax.reload();
                    });
                    $("#customer-point-table").on("click", ".delFunc", function(e) {
                        var id = $(this).data("id");
                        var form = $("#delete-admin-"+id);
                        Swal.fire({
                            title: "Are you sure?",
                            //text: "You won\"t be able to revert this!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonText: "Yes, delete it!"
                        }).then(function(result) {
                            if (result.value) {
                                form.submit();
                            }
                        });
                    });
                    $("#customer-point-table").on("change", ".change-status", function(e) {
                        var $this = $(this);
                        var id = $(this).data("id");
                        var form = $("#update-admin-status-"+id);
                        var button_text = $this.val() == 1 ? "Yes, deactivate!" : "Yes, activate!";
                        
                        Swal.fire({
                            title: "Are you sure?",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonText: button_text
                        }).then(function(result) {
                            if (result.value) {
                                form.submit();
                            }else{
                                if($this.val() == 1){
                                    $this.prop("checked", true);
                                }else{
                                    $this.prop("checked", false);
                                }
                            }
                        });
                    });
                }');
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('DT_RowIndex')->title('#')->orderable(false),
            Column::make('date')->title('Date')->orderable(false),
            Column::make('description')->title('Description')->orderable(false),
            Column::make('in')->title('In')->orderable(false),
            Column::make('out')->title('Out')->orderable(false),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Customer\Point_' . date('YmdHis');
    }
}
