@extends('students.master')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            Thêm sinh viên mới
        </div>

        <div class="card-body">
            <form action="{{ route('students.store') }}" method="post">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form">Tên sinh viên</label>
                    <div class="col-sm-10">
                        <input type="text" name="StudentName" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="StudentEmail" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form">Giới tính</label>
                    <div class="col-sm-10">
                        <select name="StudentGender" class="form-control" required>
                            <option value="0">Nam</option>
                            <option value="1">Nữ</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form">Lớp</label>
                    <div class="col-sm-10">
                        <select name="FK_ClassroomID" class="form-control" required>
                            <option value="">-- Chọn lớp --</option>
                            @foreach ($Classrooms as $Classroom)
                                <option value="{{ $Classroom->ClassroomID }}">{{ $Classroom->ClassroomName }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Thêm" />
                </div>
            </form>
        </div>
    </div>
@endsection