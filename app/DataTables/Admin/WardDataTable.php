<?php

namespace App\DataTables\Admin;

use App\Models\Room;
use App\Models\Ward;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class WardDataTable extends DataTable
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
            ->addColumn('action', function ($item) {
                return view('admin.wards.action', compact('item'));
            })
            ->addColumn('branch', function ($item) {
                return $item->branch->name ?: '-';
            })
            ->addColumn('room', function ($item) {
                return $item->room->room_number ?: '-';
            })
            ->addColumn('ward_status', function ($item) {
                $action = '<div class="form-check form-switch">';
                if ($item->status) {
                    $action .= '<input class="form-check-input change-status" type="checkbox" checked data-id="' . $item->id . '" value="' . $item->status . '">';
                } else {
                    $action .= '<input class="form-check-input change-status" type="checkbox" data-id="' . $item->id . '" value="' . $item->status . '">';
                }
                $action .= '</div>';
                $action .= '<form id="update-ward-status-' . $item->id . '" action="' . route("admin.wards.updateStatus", $item->id) . '" class="d-none" method="post">'
                    . csrf_field() . method_field("PUT") .
                    '</form>';
                return $action;
            })
            ->rawColumns(['action', 'ward_status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Ward $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Ward $model)
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
            ->setTableId('admin-wards-table')
            ->columns($this->getColumns())
            ->ajax([
                'url' => route('admin.wards.index'),
                'data' => 'function(d) {
                    d.ward_number = $("#ward_number").val();
                    d.room_id = $("#room_id").val();
                    d.branch_id = $("#branch_id").val();
                    d.ward_status = $("#ward_status").val();
                }',
            ])
            ->dom("<'d-flex justify-content-end tw-py-2' p><'row'<'col-sm-12 table-responsive' t>><'row'<'col-lg-12' <'tw-py-3 col-lg-12 d-flex flex-column flex-sm-row align-items-center justify-content-between tw-space-y-5 md:tw-space-y-0' ip>r>>")
            ->initComplete('function() {
                    $(".datatable-input").on("change",function () {
                        $("#admin-wards-table").DataTable().ajax.reload();
                    });
                    $("#subBtn").on("click",function () {
                        $("#admin-wards-table").DataTable().ajax.reload();
                    });
                    $("#clearBtn").on("click",function () {
                        $("#ward_number").val(null);
                        $("#branch_id").val(null);
                        $("#branch_id").change();
                        $("#room_id").val(null);
                        $("#room_id").change();
                        $("#ward_status").val(null);
                        $("#ward_status").change();
                        $("#admin-wards-table").DataTable().ajax.reload();
                    });
                    $("#admin-wards-table").on("click", ".delFunc", function(e) {
                        var id = $(this).data("id");
                        var form = $("#delete-ward-"+id);
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
                    $("#admin-wards-table").on("change", ".change-status", function(e) {
                        var $this = $(this);
                        var id = $(this).data("id");
                        var form = $("#update-ward-status-"+id);
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
            Column::make('ward_number')->title('Ward Number')->orderable(false),
            Column::make('room')->title('Room')->orderable(false),
            Column::make('branch')->title('Branch')->orderable(false),
            Column::make('ward_status')->title('Status')->orderable(false),
            Column::make('action')->className('text-end')->title('')->width('200px')->sorting(false),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Admin/Ward' . date('YmdHis');
    }
}
