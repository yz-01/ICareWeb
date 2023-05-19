<?php

namespace App\DataTables\doctor;

use App\Models\Room;
use App\Models\Schedule;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ScheduleDataTable extends DataTable
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
                return view('doctor.schedules.action', compact('item'));
            })
            ->addColumn('name', function ($item) {
                if($item->doctor_id)
                {
                    return $item->doctor->name ?: '-';
                }
                if($item->nurse_id)
                {
                    return $item->nurse->name ?: '-';
                }
                
            })
            ->addColumn('shift', function ($item) {
                if($item->shift == 1)
                {
                    return 'Morning Shift (8AM - 4PM)' ?: '-';
                }
                elseif($item->shift == 2)
                {
                    return 'Afternoon Shift (4PM - 12AM)' ?: '-';
                }
                elseif($item->shift == 3)
                {
                    return 'Night Shift (12AM - 8AM)' ?: '-';
                }
                
            })
            ->rawColumns(['action', 'name', 'image', 'shift']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Schedule $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Schedule $model)
    {
        return $model->localsearch(request())->where('doctor_id', auth()->id());
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('doctor-schedules-table')
            ->columns($this->getColumns())
            ->ajax([
                'url' => route('doctor.schedules.index'),
                'data' => 'function(d) {
                    d.doctor_id = $("#doctor_id").val();
                    d.nurse_id = $("#nurse_id").val();
                    d.date = $("#date").val();
                    d.shift = $("#shift").val();
                }',
            ])
            ->dom("<'d-flex justify-content-end tw-py-2' p><'row'<'col-sm-12 table-responsive' t>><'row'<'col-lg-12' <'tw-py-3 col-lg-12 d-flex flex-column flex-sm-row align-items-center justify-content-between tw-space-y-5 md:tw-space-y-0' ip>r>>")
            ->initComplete('function() {
                    $(".datatable-input").on("change",function () {
                        $("#doctor-schedules-table").DataTable().ajax.reload();
                    });
                    $("#subBtn").on("click",function () {
                        $("#doctor-schedules-table").DataTable().ajax.reload();
                    });
                    $("#clearBtn").on("click",function () {
                        $("#date").val(null);
                        $("#doctor_id").val(null);
                        $("#doctor_id").change();
                        $("#nurse_id").val(null);
                        $("#nurse_id").change();
                        $("#shift").val(null);
                        $("#shift").change();
                        $("#doctor-schedules-table").DataTable().ajax.reload();
                    });
                    $("#doctor-schedules-table").on("click", ".delFunc", function(e) {
                        var id = $(this).data("id");
                        var form = $("#delete-schedule-"+id);
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
                    $("#doctor-schedules-table").on("change", ".change-status", function(e) {
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
            Column::make('name')->title('name')->orderable(false),
            Column::make('date')->title('Date')->orderable(false),
            Column::make('shift')->title('Shift')->orderable(false),
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
        return 'doctor/Schedule' . date('YmdHis');
    }
}
