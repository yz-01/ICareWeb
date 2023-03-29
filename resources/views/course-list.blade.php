@extends('layouts.app')
@push('livewire-style')
    @livewireStyles
@endpush

@section('content')

    @livewire('course-list',[ 'allcourses'=>$allcourses, 'trainers'=>$trainers,'trainer_id'=>$trainer_id??0,'status'=>$status])

    @push('livewire-script')
        @livewireScripts
    @endpush
@endsection
