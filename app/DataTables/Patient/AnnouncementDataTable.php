<?php

namespace App\DataTables\Patient;

use App\Models\Announcement;
use App\Models\Level;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Carbon\Carbon;

class AnnouncementDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn('DT_RowIndex')
            ->addColumn('action', function ($item) {
                return view('patient.announcements.action', compact('item'));
            })
            ->addColumn('published_to', function($item) {
                $data = '';
                if($item->published_to == 1)
                {
                    $data .= "All";
                }
                elseif($item->published_to == 2)
                {
                    $data .= "Doctors";
                }
                elseif($item->published_to == 3)
                {
                    $data .= "Nurses";
                }
                elseif($item->published_to == 3)
                {
                    $data .= "Patients";
                }
                return $data;
            })
            ->addColumn('created_at', function($item) {
                return $item->created_at->format('d/m/Y h:i');
            })
            ->addColumn('published_at', function($item) {
                if($item->published_at != NULL){
                    return Carbon::parse($item->published_at)->format('d/m/Y H:i');
                }
            })
            ->rawColumns(['published_to', 'action', 'published_at']);
    }

    public function query(Announcement $model)
    {
        return $model->localsearch(request())->where('branch_id', auth()->user()->branch_id)->orWhere(function ($query) {
            $query->where('published_to', 1)
                ->orWhere('published_to', 4);
        });
    }

    public function html()
    {
        return $this->builder()
                    ->setTableId('patient-announcement-table')
                    ->columns($this->getColumns())
                    ->ajax([
                        'url' => route('patient.announcements.index'),
                        'data' => 'function(d) {
                            d.title = $("#title").val();
                            d.published_to = $("#published_to").val();
                        }',
                    ])
                    ->dom("<'d-flex justify-content-end tw-py-2' p><'row'<'col-sm-12' t>><'row'<'col-lg-12' <'tw-py-3 col-lg-12 d-flex flex-column flex-sm-row align-items-center justify-content-between tw-space-y-5 md:tw-space-y-0' ip>r>>")
                    ->initComplete('function() {
                            $(".datatable-input").on("change",function () {
                                $("#patient-announcement-table").DataTable().ajax.reload();
                            });
                            $("#subBtn").on("click",function () {
                                $("#patient-announcement-table").DataTable().ajax.reload();
                            });
                            $("#clearBtn").on("click",function () {
                                $("#title").val(null);
                                $("#published_to").val(null);
                                $("#published_to").change();
                                $("#patient-announcement-table").DataTable().ajax.reload();
                            });
                            $("#patient-announcement-table").on("click", ".delFunc", function(e) {
                                var del_id = ".destroy_" + $(this).attr("data-id");
                                event.preventDefault();
                                Swal.fire({
                                    title: "Are you sure?",
                                    text: "You won\'t be able to revert this!",
                                    icon: "warning",
                                    showCancelButton: true,
                                    confirmButtonText: "Yes, Delete it!"
                                }).then(function(result) {
                                    if (result.value) {
                                        $(del_id).submit();
                                    }
                                    else{
                                        if(id.prop("checked")) { id.prop("checked", false); }
                                        else { id.prop("checked", true); }
                                    }
                                });
                            });
                            $("#patient-announcement-table").on("click", ".resFunc", function(e) {
                                var del_id = ".restore_" + $(this).attr("data-id");
                                var id = $(this);
                                Swal.fire({
                                    title: "Are you sure?",
                                    icon: "warning",
                                    showCancelButton: true,
                                    confirmButtonText: "Yes, activate it!"
                                }).then(function(result) {
                                    if (result.value) {
                                        $(del_id).submit();
                                    }
                                    else{
                                        if(id.prop("checked")) { id.prop("checked", false); }
                                        else { id.prop("checked", true); }
                                    }
                                });
                            });
                        }');
    }

    protected function getColumns()
    {
        return [
            Column::make('DT_RowIndex')->title('#')->orderable(false),
            Column::make('published_to')->title('Publish To')->orderable(false),
            Column::make('title')->title('Title')->orderable(false),
            Column::make('published_at')->title('Publish At')->orderable(false),
            Column::make('action')->className('text-end')->title('')->width('200px')->sorting(false),
        ];
    }

    protected function filename()
    {
        return 'Patient\Announcement_' . date('YmdHis');
    }
}
