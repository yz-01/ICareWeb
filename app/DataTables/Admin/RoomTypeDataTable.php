<?php

namespace App\DataTables\Admin;

use App\Models\RoomType;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RoomTypeDataTable extends DataTable
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
                return view('admin.roomTypes.action', compact('item'));
            })
            ->addColumn('roomType_status', function ($item) {
                $action = '<div class="form-check form-switch">';
                if ($item->status) {
                    $action .= '<input class="form-check-input change-status" type="checkbox" checked data-id="' . $item->id . '" value="' . $item->status . '">';
                } else {
                    $action .= '<input class="form-check-input change-status" type="checkbox" data-id="' . $item->id . '" value="' . $item->status . '">';
                }
                $action .= '</div>';
                $action .= '<form id="update-room-status-' . $item->id . '" action="' . route("admin.roomTypes.updateStatus", $item->id) . '" class="d-none" method="post">'
                    . csrf_field() . method_field("PUT") .
                    '</form>';
                return $action;
            })
            ->rawColumns(['action', 'roomType_status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\RoomType $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(RoomType $model)
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
            ->setTableId('admin-roomTypes-table')
            ->columns($this->getColumns())
            ->ajax([
                'url' => route('admin.roomTypes.index'),
                'data' => 'function(d) {
                    d.name = $("#name").val();
                    d.roomType_status = $("#roomType_status").val();
                }',
            ])
            ->dom("<'d-flex justify-content-end tw-py-2' p><'row'<'col-sm-12 table-responsive' t>><'row'<'col-lg-12' <'tw-py-3 col-lg-12 d-flex flex-column flex-sm-row align-items-center justify-content-between tw-space-y-5 md:tw-space-y-0' ip>r>>")
            ->initComplete('function() {
                    $(".datatable-input").on("change",function () {
                        $("#admin-roomTypes-table").DataTable().ajax.reload();
                    });
                    $("#subBtn").on("click",function () {
                        $("#admin-roomTypes-table").DataTable().ajax.reload();
                    });
                    $("#clearBtn").on("click",function () {
                        $("#nam").val(null);
                        $("#roomType_status").val(null);
                        $("#roomType_status").change();
                        $("#admin-roomTypes-table").DataTable().ajax.reload();
                    });
                    $("#admin-roomTypes-table").on("click", ".delFunc", function(e) {
                        var id = $(this).data("id");
                        var form = $("#delete-room-"+id);
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
                    $("#admin-roomTypes-table").on("change", ".change-status", function(e) {
                        var $this = $(this);
                        var id = $(this).data("id");
                        var form = $("#update-room-status-"+id);
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
            Column::make('name')->title('Name')->orderable(false),
            Column::make('roomType_status')->title('Status')->orderable(false),
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
        return 'Admin/RoomType' . date('YmdHis');
    }
}
