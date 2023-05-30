@extends('doctor.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-sm-0 font-size-18">Schedule</h4>
                <ol class="breadcrumb m-0 mt-3">
                    <li class="breadcrumb-item">
                        <a href="{{ route('doctor.schedules.index') }}">Schedule List</a>
                    </li>
                    <li class="breadcrumb-item active">Calendar</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<form action="{{ route('doctor.schedules.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Schedule Information</h4>
                            <div class="table-responsive">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var calendar = $('#calendar').fullCalendar({
            contentHeight: 600,
            editable: true,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month'
            },
            events: [
                <?php
                foreach ($schedule as $schedules) {
                    if ($schedules['shift'] == 1) 
                    {
                        if($schedules['doctor'] != null)
                        {
                            ?> {
                                title: "<?= str_replace("&apos", "'", $schedules->doctor->name), " Morning Shift (8AM - 4PM)" ?>",
                                start: "<?= $schedules['date']  ?>",
                                color: "#556ee6",
                                textColor: 'white',
                                url: "",
                            },
                            <?php
                        }
                        else
                        {
                            ?> {
                                title: "<?= str_replace("&apos", "'", $schedules->nurse->name), " Morning Shift (8AM - 4PM)" ?>",
                                start: "<?= $schedules['date']  ?>",
                                color: "#39c492",
                                textColor: 'red',
                                url: "",
                            },
                            <?php
                        }
                    } 
                    elseif($schedules['shift'] == 2)
                    {
                        if($schedules['doctor'] != null)
                        {
                            ?> {
                                title: "<?= str_replace("&apos", "'", $schedules->doctor->name), " Afternoon Shift (4PM - 12AM)" ?>",
                                start: "<?= $schedules['date']  ?>",
                                color: "#556ee6",
                                textColor: 'white',
                                url: "",
                            },
                            <?php
                        }
                        else
                        {
                            ?> {
                                title: "<?= str_replace("&apos", "'", $schedules->nurse->name), " Afternoon Shift (4PM - 12AM)" ?>",
                                start: "<?= $schedules['date']  ?>",
                                color: "#39c492",
                                textColor: 'red',
                                url: "",
                            },
                            <?php
                        }
                    }
                    else
                    {
                        if($schedules['doctor'] != null)
                        {
                            ?> {
                                title: "<?= str_replace("&apos", "'", $schedules->doctor->name), " Night Shift (12AM - 8AM)" ?>",
                                start: "<?= $schedules['date']  ?>",
                                color: "#556ee6",
                                textColor: 'white',
                                url: "",
                            },
                            <?php
                        }
                        else
                        {
                            ?> {
                                title: "<?= str_replace("&apos", "'", $schedules->nurse->name), " AfternoNighton Shift (12AM - 8AM)" ?>",
                                start: "<?= $schedules['date']  ?>",
                                color: "#39c492",
                                textColor: 'red',
                                url: "",
                            },
                            <?php
                        }
                    }
                }
                ?>
            ],

        });

    });
</script>
@endpush