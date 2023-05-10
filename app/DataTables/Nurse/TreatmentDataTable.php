<?php

namespace App\DataTables\Nurse;

use App\Models\SupportDoctor;
use App\Models\SupportNurse;
use App\Models\Treatment;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Carbon\Carbon;

class TreatmentDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn('DT_RowIndex')
            ->editColumn('image', function($item) {
                if($item->image)
                {
                    return "<a target='_blank' href='".asset($item->patient->image)."'><img src='".asset($item->patient->image)."' style='width: 50px; height: 50px' class='rounded-circle'></a>";
                }
                else
                {
                    return "<a target='_blank' href='".asset('images/default/profile.png')."'><img src='".asset('images/default/profile.png')."' style='width: 50px; height: 50px' class='rounded-circle'></a>";
                }
            })
            ->addColumn('action', function ($item) {
                return view('nurse.treatments.action', compact('item'));
            })
            ->addColumn('patient', function ($item) {
                return $item->patient->name ?: '-';
            })
            ->addColumn('doctor', function($item) {
                $doctor = '';

                $doctor .= 'Dr. ' . $item->doctor->name . ', ';

                $support_doctor = SupportDoctor::where('treatment_id', $item->id)->get();
                
                foreach($support_doctor as $support_patients)
                {
                    $doctor .= 'Dr. ' .  $support_patients->doctor->name . ', ';
                }
                return $doctor;
            })
            ->addColumn('nurse', function($item) {
                $nurse = '';

                $nurse .= $item->nurse->name . ', ';

                $support_nurse = SupportNurse::where('treatment_id', $item->id)->get();
                
                foreach($support_nurse as $support_nurses)
                {
                    $nurse .= $support_nurses->nurse->name . ', ';
                }
                return $nurse;
            })
            ->addColumn('ward', function ($item) {
                return $item->ward->ward_number ?: '-';
            })
            ->rawColumns(['action', 'image', 'patient', 'doctor_team', 'nurse', 'ward']);
    }

    public function query(Treatment $model)
    {
        $treatment = SupportNurse::where('support_nurse_id', auth()->id())->pluck('treatment_id');

        return $model->localsearch(request())->orWhere('pic_nurse_id', auth()->id())->orWhereIn('id', $treatment);
    }

    public function html()
    {
        return $this->builder()
                    ->setTableId('nurse-treatment-table')
                    ->columns($this->getColumns())
                    ->ajax([
                        'url' => route('nurse.treatments.index'),
                        'data' => 'function(d) {
                            d.patient_id = $("#patient_id").val();
                            d.doctor_id = $("#doctor_id").val();
                            d.nurse_id = $("#nurse_id").val();
                            d.title = $("#title").val();
                        }',
                    ])
                    ->dom("<'d-flex justify-content-end tw-py-2' p><'row'<'col-sm-12' t>><'row'<'col-lg-12' <'tw-py-3 col-lg-12 d-flex flex-column flex-sm-row align-items-center justify-content-between tw-space-y-5 md:tw-space-y-0' ip>r>>")
                    ->initComplete('function() {
                            $(".datatable-input").on("change",function () {
                                $("#nurse-treatment-table").DataTable().ajax.reload();
                            });
                            $("#subBtn").on("click",function () {
                                $("#nurse-treatment-table").DataTable().ajax.reload();
                            });
                            $("#clearBtn").on("click",function () {
                                $("#patient_id").val(null);
                                $("#patient_id").change();
                                $("#doctor_id").val(null);
                                $("#doctor_id").change();
                                $("#nurse_id").val(null);
                                $("#nurse_id").change();
                                $("#title").val(null);
                                $("#nurse-treatment-table").DataTable().ajax.reload();
                            });
                            $("#nurse-treatment-table").on("click", ".delFunc", function(e) {
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
                            $("#nurse-treatment-table").on("click", ".resFunc", function(e) {
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
            Column::make('image')->title('Image')->orderable(false),
            Column::make('patient')->title('Patient Name')->orderable(false),
            Column::make('doctor')->title('Doctor')->orderable(false),
            Column::make('nurse')->title('Nurse')->orderable(false),
            Column::make('title')->title('Title')->orderable(false),
            Column::make('action')->className('text-end')->title('')->width('200px')->sorting(false),
        ];
    }

    protected function filename()
    {
        return 'Nurse\Treatment_' . date('YmdHis');
    }
}
