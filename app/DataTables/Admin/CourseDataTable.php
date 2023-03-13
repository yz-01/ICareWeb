<?php

namespace App\DataTables\Admin;

use App\Models\Admin;
use App\Models\Course;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CourseDataTable extends DataTable
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
            ->addColumn('action', function ($item) {
                return view('admin.courses.action', compact('item'));
            })
            ->addColumn('title', function($item){
                return $item->title ?: '-';
            })
            ->addColumn('desc', function($item){
                return $item->description ?: '-';
            })
            ->addColumn('datetime', function($item){
                return $item->datetime ?: '-';
            })
            ->addColumn('duration', function($item){
                return $item->duration ?: '-';
            })
            ->addColumn('venue', function($item){
                return $item->venue==0 ? 'Online' : $item->venue;
            })
            ->addColumn('claimable', function($item){
                return $item->hrdf_claimable==1 ? 'Yes' : 'No';
            })
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Admin\Courses $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Course $model)
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
            ->setTableId('admin-courses-table')
            ->columns($this->getColumns())
            ->ajax([
                'url' => route('admin.courses.index'),
                'data' => 'function(d) {
                    d.title = $("#title").val();
                    d.desc = $("#desc").val();
                    d.datetime = $("#datetime").val();
                    d.duration = $("#duration").val();
                    d.venue = $("#venue").val();
                    d.claimable = $("#claimable").val();
                }',
            ])
            ->dom("<'d-flex justify-content-end tw-py-2' p><'row'<'col-sm-12 table-responsive' t>><'row'<'col-lg-12' <'tw-py-3 col-lg-12 d-flex flex-column flex-sm-row align-items-center justify-content-between tw-space-y-5 md:tw-space-y-0' ip>r>>")
            ->initComplete('function() {
                    $(".datatable-input").on("change",function () {
                        $("#admin-courses-table").DataTable().ajax.reload();
                    });
                    $("#subBtn").on("click",function () {
                        $("#admin-courses-table").DataTable().ajax.reload();
                    });
                    $("#clearBtn").on("click",function () {
                        $("#title").val(null);
                        $("#desc").val(null);
                        $("#datetime").val(null);
                        $("#duration").val(null);
                        $("#venue").val(null);
                        $("#claimable").change();
                        $("#admin-courses-table").DataTable().ajax.reload();
                    });
                    $("#admin-courses-table").on("click", ".delFunc", function(e) {
                        var id = $(this).data("id");
                        var form = $("#delete-courses-"+id);
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
            Column::make('title')->title('Title')->orderable(false),
            Column::make('desc')->title('Description')->orderable(false),
            Column::make('datetime')->title('Date Time')->orderable(false),
            Column::make('duration')->title('Duration in Day(s)')->orderable(false),
            Column::make('venue')->title('Venue / Online')->orderable(false),
            Column::make('claimable')->title('Hrdf Claimable')->orderable(false),
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
        return 'Admin\Course_' . date('YmdHis');
    }
}
