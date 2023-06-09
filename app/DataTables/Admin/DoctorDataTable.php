<?php

namespace App\DataTables\Admin;

use App\Models\Doctor;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DoctorDataTable extends DataTable
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
            ->editColumn('image', function($item) {
                if($item->image)
                {
                    return "<a target='_blank' href='".asset($item->image)."'><img src='".asset($item->image)."' style='width: 50px; height: 50px' class='rounded-circle'></a>";
                }
                else
                {
                    return "<a target='_blank' href='".asset('images/default/profile.png')."'><img src='".asset('images/default/profile.png')."' style='width: 50px; height: 50px' class='rounded-circle'></a>";
                }
            })
            ->addColumn('branch', function($item){
                return $item->branch->name ?: '-';
            })
            ->addColumn('action', function ($item) {
                return view('admin.doctors.action', compact('item'));
            })
            ->addColumn('email', function($item){
                return $item->email ?: '-';
            })
            ->addColumn('identity_card', function($item){
                return $item->identity_card ?: '-';
            })
            ->addColumn('doctor_status', function($item){
                $action = '<div class="form-check form-switch">';
                        if($item->status) 
                        {
                            $action .= '<input class="form-check-input change-status" type="checkbox" checked data-id="'.$item->id.'" value="'.$item->status.'">';
                        } 
                        else 
                        {
                            $action .= '<input class="form-check-input change-status" type="checkbox" data-id="'.$item->id.'" value="'.$item->status.'">';
                        }
                $action .= '</div>';
                $action .= '<form id="update-doctor-status-'.$item->id.'" action="'.route("admin.doctors.updateStatus", $item->id).'" class="d-none" method="post">'
                            .csrf_field().method_field("PUT").
                           '</form>';
                return $action;
            })
            ->rawColumns(['action','doctor_status', 'image', 'branch']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Doctor $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Doctor $model)
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
            ->setTableId('admin-doctors-table')
            ->columns($this->getColumns())
            ->ajax([
                'url' => route('admin.doctors.index'),
                'data' => 'function(d) {
                    d.code = $("#code").val();
                    d.name = $("#name").val();
                    d.email = $("#email").val();
                    d.identity_card = $("#identity_card").val();
                    d.identity_card = $("#identity_card").val();
                    d.area_of_experise = $("#area_of_experise").val();
                    d.branch_id = $("#branch_id").val();
                }',
            ])
            ->dom("<'d-flex justify-content-end tw-py-2' p><'row'<'col-sm-12 table-responsive' t>><'row'<'col-lg-12' <'tw-py-3 col-lg-12 d-flex flex-column flex-sm-row align-items-center justify-content-between tw-space-y-5 md:tw-space-y-0' ip>r>>")
            ->initComplete('function() {
                    $(".datatable-input").on("change",function () {
                        $("#admin-doctors-table").DataTable().ajax.reload();
                    });
                    $("#subBtn").on("click",function () {
                        $("#admin-doctors-table").DataTable().ajax.reload();
                    });
                    $("#clearBtn").on("click",function () {
                        $("#code").val(null);
                        $("#name").val(null);
                        $("#email").val(null);
                        $("#area_of_experise").val(null);
                        $("#identity_card").val(null);
                        $("#doctor_status").val(null);
                        $("#doctor_status").change();
                        $("#branch_id").val(null);
                        $("#branch_id").change();
                        $("#admin-doctors-table").DataTable().ajax.reload();
                    });
                    $("#admin-doctors-table").on("click", ".delFunc", function(e) {
                        var id = $(this).data("id");
                        var form = $("#delete-doctor-"+id);
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
                    $("#admin-doctors-table").on("change", ".change-status", function(e) {
                        var $this = $(this);
                        var id = $(this).data("id");
                        var form = $("#update-doctor-status-"+id);
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
            Column::make('image')->title('Image')->orderable(false),
            Column::make('branch')->title('Branch')->orderable(false),
            Column::make('code')->title('Code')->orderable(false),
            Column::make('username')->title('Username')->orderable(false),
            Column::make('name')->title('Name')->orderable(false),
            Column::make('email')->title('Email')->orderable(false),
            Column::make('area_of_experise')->title('Area of Expertise')->orderable(false),
            Column::make('doctor_status')->title('Status')->orderable(false),
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
        return 'Admin/Doctor' . date('YmdHis');
    }
}
