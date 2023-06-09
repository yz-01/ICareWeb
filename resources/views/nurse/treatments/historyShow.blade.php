@extends('nurse.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-sm-0 font-size-18">Treatment History</h4>
                <ol class="breadcrumb m-0 mt-3">
                    <li class="breadcrumb-item"><a href="{{route('nurse.treatments.index')}}">Treatment List</a></li>
                    <li class="breadcrumb-item"><a href="{{route('nurse.treatments.history', ['treatment_id' => $treatment])}}">Treatment History List</a></li>
                    <li class="breadcrumb-item active">Treatment History</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<form action="{{route('nurse.treatments.historyUpdate')}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="row">
        <div class="col-xl-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Treatment History Details</h4>
                    <div class="row">
                        <input type="number" name="treatment_id" id="treatment_id" value="{{ $treatment }}" hidden>
                        <input type="number" name="history_id" id="history_id" value="{{ $history->id }}" hidden>

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Image</label>
                            <div class="file-upload w-100">
                                <div class="camera-bg" style="display: none; left: auto !important;" id="camera1"></div>
                                @if ($history->image == null)
                                <i class="fa fa-plus" id="imageResultIcon1" style="border-radius:5px;"></i>
                                <img id="imageResult1" class="w-100 h-100" style="object-fit: contain !important; display: none;" />
                                @else
                                <img id="imageResult1" src="{{ asset($history->image) }}" class="w-100 h-100" style="object-fit:contain;">
                                @endif
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-nowrap mb-0">
                                <tbody>
                                    <tr>
                                        <th scope="row">Date :</th>
                                        <td>{{ $history->date }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Time :</th>
                                        <td>{{ $history->time }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Patient Healthy Status :</th>
                                        <td>
                                            @if($history->patient_healthy_status == 1)
                                            Excellent
                                            @elseif($history->patient_healthy_status == 2)
                                            Good
                                            @elseif($history->patient_healthy_status == 3)
                                            Normal
                                            @elseif($history->patient_healthy_status == 4)
                                            Fair
                                            @else
                                            Bad
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Content Information</h4>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-nowrap mb-0">
                                <tbody>
                                    <tr>
                                        <th scope="row">Title :</th>
                                        <td>{{ $history->title }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Doctor Remark :</th>
                                        <td>{!! $history->doctor_remark !!}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nurse Remark :</th>
                                        <td>{!! $history->nurse_remark !!}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Medicines Information</h4>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label class="form-label">Name<span class="text-danger">*</span></label>
                                @foreach($history_medicine as $history_medicines)
                                <select class="form-select @error('medicine_id') is-invalid @enderror" name="medicine_id[{{ $history_medicines->id }}]" id="medicine_id" disabled>
                                    <option selected="" value="">-- Please Select --</option>
                                    @foreach($medicine as $medicines)
                                    <option value="{{ $medicines->id }}" {{ $history_medicines->medicine_id == $medicines->id ? 'selected' : '' }}>{{ $medicines->name }}</option>
                                    @endforeach
                                </select>
                                <input type="number" name="medicine_id[{{ $history_medicines->id }}]" id="medicine_id" value="{{ $history_medicines->medicine_id }}" hidden>
                                <br>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Number of Usage<span class="text-danger">*</span></label>
                                @foreach($history_medicine as $history_medicines)
                                <input type="number" class="form-control" name="number_of_usage[{{ $history_medicines->id }}]" value="{{ $history_medicines->usage_of_medicine }}" disabled>
                                <br>
                                @endforeach
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
<script>
    function readURL(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#imageResultIcon' + id).hide();
                $('#imageResult' + id)
                    .attr('src', e.target.result);
                $('#imageResult' + id).show();
                $('#camera' + id).show();
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush