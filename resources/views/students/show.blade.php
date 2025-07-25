@extends('students.master')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><b>Thông tin sinh viên chi tiết</b></div>
            <div class="col col-md-6">
                <a href="{{ route('students.index') }}" class="btn btn-success btn-sm float-end">Xem tất cả danh sách</a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Mã sinh viên</b></label>
            <div class="col-sm-10">
                {{ $Student->StudentID }}
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Tên sinh viên</b></label>
            <div class="col-sm-10">
                {{ $Student->StudentName }}
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Email</b></label>
            <div class="col-sm-10">
                {{ $Student->StudentEmail }}
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Giới tính</b></label>
            <div class="col-sm-10">
                @if($Student->StudentGender == 0) Nam 
                @elseif($Student->StudentGender == 1) Nữ 
                @else Khác 
                @endif
            </div>
        </div>
        
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Lớp</b></label>
            <div class="col-sm-10">
                {{ $Student->Classroom->ClassroomName }}
            </div>
        </div>


        <div class="text-center">
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
        
    </div>
</div>

@endsection('content')