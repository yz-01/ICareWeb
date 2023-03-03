<?php

namespace App\DataTables\Admin;

use App\Models\CenterUser;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CenterUserDataTable extends DataTable
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
            ->editColumn('image', function($item) {
                if($item->image)
                {
                    return "<a target='_blank' href='".asset($item->image)."'><img src='".asset($item->image)."' style='width: 50px; height: 50px' class='rounded-circle'></a>";
                }
                else
                {
                    return "<a target='_blank' href='".asset('images/default/logo.png')."'><img src='".asset('images/default/logo.png')."' style='width: 50px; height: 50px' class='rounded-circle'></a>";
                }
            })
            ->addColumn('action', function ($item) {
                return view('admin.center_users.action', compact('item'));
            })
            ->addColumn('email', function($item){
                return $item->email ?: '-';
            })
            ->addColumn('center_user_status', function($item){
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
                $action .= '<form id="update-center-user-status-'.$item->id.'" action="'.route("admin.center_users.updateStatus", $item->id).'" class="d-none" method="post">'
                            .csrf_field().method_field("PUT").
                           '</form>';
                return $action;
            })
            ->rawColumns(['action','center_user_status', 'image']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Admin\CenterUser $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(CenterUser $model)
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
            ->setTableId('admin-center_users-table')
            ->columns($this->getColumns())
            ->ajax([
                'url' => route('admin.center_users.index'),
                'data' => 'function(d) {
                    d.code = $("#code").val();
                    d.name = $("#name").val();
                    d.company_name = $("#company_name").val();
                    d.email = $("#email").val();
                    d.center_user_status = $("#center_user_status").val();
                }',
            ])
            ->dom("<'d-flex justify-content-end tw-py-2' p><'row'<'col-sm-12 table-responsive' t>><'row'<'col-lg-12' <'tw-py-3 col-lg-12 d-flex flex-column flex-sm-row align-items-center justify-content-between tw-space-y-5 md:tw-space-y-0' ip>r>>")
            ->initComplete('function() {
                    $(".datatable-input").on("change",function () {
                        $("#admin-center_users-table").DataTable().ajax.reload();
                    });
                    $("#subBtn").on("click",function () {
                        $("#admin-center_users-table").DataTable().ajax.reload();
                    });
                    $("#clearBtn").on("click",function () {
                        $("#code").val(null);
                        $("#name").val(null);
                        $("#company_name").val(null);
                        $("#email").val(null);
                        $("#center_user_status").val(null);
                        $("#center_user_status").change();
                        $("#admin-center_users-table").DataTable().ajax.reload();
                    });
                    $("#admin-center_users-table").on("click", ".delFunc", function(e) {
                        var id = $(this).data("id");
                        var form = $("#delete-center-user-"+id);
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
                    $("#admin-center_users-table").on("change", ".change-status", function(e) {
                        var $this = $(this);
                        var id = $(this).data("id");
                        var form = $("#update-center-user-status-"+id);
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
            Column::make('image')->title('Image')->orderable(false),
            Column::make('code')->title('Code')->orderable(false),
            Column::make('username')->title('Username')->orderable(false),
            Column::make('company_name')->title('Company Name')->orderable(false),
            Column::make('name')->title('PIC Name')->orderable(false),
            Column::make('email')->title('Email')->orderable(false),
            Column::make('center_user_status')->title('Status')->orderable(false),
            Column::make('action')->className('text-end')->title('')->sorting(false),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Admin\CenterUser_' . date('YmdHis');
    }
}
