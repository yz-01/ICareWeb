<?php

namespace App\DataTables\Admin;

use App\Models\Announcement;
use App\Models\Level;
use App\Models\Medicine;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Carbon\Carbon;

class MedicineDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn('DT_RowIndex')
            ->editColumn('image', function ($item) {
                if ($item->image) {
                    return "<a target='_blank' href='" . asset($item->image) . "'><img src='" . asset($item->image) . "' style='width: 50px; height: 50px' class='rounded-circle'></a>";
                } else {
                    return "<a target='_blank' href='" . asset('images/default/medicine.png') . "'><img src='" . asset('images/default/medicine.png') . "' style='width: 50px; height: 50px' class='rounded-circle'></a>";
                }
            })
            ->addColumn('action', function ($item) {
                return view('admin.medicines.action', compact('item'));
            })
            ->addColumn('branch', function ($item) {
                return $item->branch->name;
            })
            ->addColumn('stock', function ($item) {
                if($item->number < 10)
                {
                    return $item->number . ' (Low Stock)';
                }
                elseif($item->number == 0)
                {
                    return $item->number . ' (Out of Stock)';
                }
                else
                {
                    return $item->number;
                }
                
            })
            ->rawColumns(['branch', 'action', 'image', 'stock']);
    }

    public function query(Medicine $model)
    {
        return $model->localsearch(request());
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('admin-medicines-table')
            ->columns($this->getColumns())
            ->ajax([
                'url' => route('admin.medicines.index'),
                'data' => 'function(d) {
                    d.code = $("#code").val();
                    d.name = $("#name").val();
                    d.branch_id = $("#branch_id").val();
                }',
            ])
            ->dom("<'d-flex justify-content-end tw-py-2' p><'row'<'col-sm-12 table-responsive' t>><'row'<'col-lg-12' <'tw-py-3 col-lg-12 d-flex flex-column flex-sm-row align-items-center justify-content-between tw-space-y-5 md:tw-space-y-0' ip>r>>")
            ->initComplete('function() {
                    $(".datatable-input").on("change",function () {
                        $("#admin-medicines-table").DataTable().ajax.reload();
                    });
                    $("#subBtn").on("click",function () {
                        $("#admin-medicines-table").DataTable().ajax.reload();
                    });
                    $("#clearBtn").on("click",function () {
                        $("#code").val(null);
                        $("#name").val(null);
                        $("#branch_id").val(null);
                        $("#branch_id").change();
                        $("#admin-medicines-table").DataTable().ajax.reload();
                    });
                    $("#admin-medicines-table").on("click", ".delFunc", function(e) {
                        var id = $(this).data("id");
                        var form = $("#delete-medicine-"+id);
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
                    $("#admin-medicines-table").on("change", ".change-status", function(e) {
                        var $this = $(this);
                        var id = $(this).data("id");
                        var form = $("#update-medicine-status-"+id);
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

    protected function getColumns()
    {
        return [
            Column::make('DT_RowIndex')->title('#')->orderable(false),
            Column::make('image')->title('Image')->orderable(false),
            Column::make('branch')->title('Branch')->orderable(false),
            Column::make('code')->title('Code')->orderable(false),
            Column::make('name')->title('Name')->orderable(false),
            Column::make('stock')->title('Stock')->orderable(false),
            Column::make('action')->className('text-end')->title('')->width('200px')->sorting(false),
        ];
    }

    protected function filename()
    {
        return 'Admin\Medicine' . date('YmdHis');
    }
}
