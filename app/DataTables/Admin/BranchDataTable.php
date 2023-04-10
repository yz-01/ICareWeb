<?php

namespace App\DataTables\Admin;

use App\Models\Branch;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BranchDataTable extends DataTable
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
            ->editColumn('image', function ($item) {
                if ($item->logo) {
                    return "<a target='_blank' href='" . asset($item->logo) . "'><img src='" . asset($item->logo) . "' style='width: 50px; height: 50px' class='rounded-circle'></a>";
                } else {
                    return "<a target='_blank' href='" . asset('images/default/profile.png') . "'><img src='" . asset('images/default/profile.png') . "' style='width: 50px; height: 50px' class='rounded-circle'></a>";
                }
            })
            ->addColumn('action', function ($item) {
                return view('admin.branches.action', compact('item'));
            })
            ->addColumn('email', function ($item) {
                return $item->email ?: '-';
            })
            ->addColumn('address', function ($item) {
                $address = $item->address1 . ', ' . $item->address2;
                return $address ?: '-';
            })
            ->addColumn('city', function ($item) {
                return $item->city->name ?: '-';
            })
            ->addColumn('state', function ($item) {
                return $item->state->name ?: '-';
            })
            ->addColumn('country', function ($item) {
                return $item->country->name ?: '-';
            })
            ->addColumn('branch_status', function ($item) {
                $action = '<div class="form-check form-switch">';
                if ($item->status) {
                    $action .= '<input class="form-check-input change-status" type="checkbox" checked data-id="' . $item->id . '" value="' . $item->status . '">';
                } else {
                    $action .= '<input class="form-check-input change-status" type="checkbox" data-id="' . $item->id . '" value="' . $item->status . '">';
                }
                $action .= '</div>';
                $action .= '<form id="update-branch-status-' . $item->id . '" action="' . route("admin.branches.updateStatus", $item->id) . '" class="d-none" method="post">'
                    . csrf_field() . method_field("PUT") .
                    '</form>';
                return $action;
            })
            ->rawColumns(['action', 'branch_status', 'image', 'country']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Branch $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Branch $model)
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
            ->setTableId('admin-branches-table')
            ->columns($this->getColumns())
            ->ajax([
                'url' => route('admin.branches.index'),
                'data' => 'function(d) {
                    d.name = $("#name").val();
                    d.city_id = $("#city_id").val();
                    d.state_id = $("#state_id").val();
                    d.country_id = $("#country_id").val();
                    d.branch_status = $("#branch_status").val();
                }',
            ])
            ->dom("<'d-flex justify-content-end tw-py-2' p><'row'<'col-sm-12 table-responsive' t>><'row'<'col-lg-12' <'tw-py-3 col-lg-12 d-flex flex-column flex-sm-row align-items-center justify-content-between tw-space-y-5 md:tw-space-y-0' ip>r>>")
            ->initComplete('function() {
                    $(".datatable-input").on("change",function () {
                        $("#admin-branches-table").DataTable().ajax.reload();
                    });
                    $("#subBtn").on("click",function () {
                        $("#admin-branches-table").DataTable().ajax.reload();
                    });
                    $("#clearBtn").on("click",function () {
                        $("#name").val(null);
                        $("#city_id").val(null);
                        $("#city_id").change();
                        $("#state_id").val(null);
                        $("#state_id").change();
                        $("#country_id").val(null);
                        $("#country_id").change();
                        $("#branch_status").val(null);
                        $("#branch_status").change();
                        $("#admin-branches-table").DataTable().ajax.reload();
                    });
                    $("#admin-branches-table").on("click", ".delFunc", function(e) {
                        var id = $(this).data("id");
                        var form = $("#delete-branch-"+id);
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
                    $("#admin-branches-table").on("change", ".change-status", function(e) {
                        var $this = $(this);
                        var id = $(this).data("id");
                        var form = $("#update-branch-status-"+id);
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
            Column::make('name')->title('Name')->orderable(false),
            Column::make('email')->title('Email')->orderable(false),
            Column::make('address')->title('Address')->orderable(false),
            Column::make('city')->title('City')->orderable(false),
            Column::make('state')->title('State')->orderable(false),
            Column::make('country')->title('Country')->orderable(false),
            Column::make('branch_status')->title('Status')->orderable(false),
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
        return 'Admin/Branch' . date('YmdHis');
    }
}
