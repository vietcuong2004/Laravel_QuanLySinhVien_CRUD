@extends('students.master')

@section('content')

@if ($message = Session::get('success'))

    <div class="alert alert-success">
        {{ $message }}
    </div>

@endif

<div class="container mt-5">
    <h1 class="text-primary mt-3 mb-4 text-center"><b>Quản lý sinh viên</b></h1>
</div>

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><b></b></div>
            <div class="col col-md-6">
                <a href="{{ route('students.create') }}" class="btn btn-success btn-sm float-end">Thêm sinh viên mới</a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Mã sinh viên</th>
                <th>Tên sinh viên</th>
                <th>Email</th>
                <th>Giới tính</th>
                <th>Lớp</th>
                <th>Thao tác</th>
            </tr>
            @if(isset($Students) && count($Students) > 0)

                @foreach($Students as $row)
                    <tr>
                        <td>{{ $row->StudentID }}</td>
                        <td>{{ $row->StudentName }}</td>
                        <td>{{ $row->StudentEmail }}</td>
                        <td> @if($row->StudentGender==0) Nam @else Nữ @endif</td>
                        <td>{{ $row->Classroom->ClassroomName }}</td>
                        <td>
                            <form action="{{ route('students.destroy', $row->StudentID) }}" method="post" id="delete-form-{{ $row->StudentID }}">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('students.show', $row->StudentID) }}" class="btn btn-primary btn-sm">Xem chi tiết</a>
                                <a href="{{ route('students.edit', $row->StudentID) }}" class="btn btn-warning btn-sm">Sửa</a>
                                <button type="button" class="btn btn-danger btn-sm" onclick="showDeleteModal({{ $row->StudentID }}, '{{ $row->StudentName }}')">Xóa</button>
                                <!-- <button type="button" class="btn btn-danger btn-sm">Xóa</button> -->
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" class="text-center">No Data Found</td>
                </tr>
            @endif
        </table>

      
    </div>
</div>

<!-- Modal Xác nhận xóa -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Xác nhận xóa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn xóa sinh viên <span id="StudentName"></span>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Đồng ý</button>
            </div>
        </div>
    </div>
</div>

<script>
let StudentIdToDelete = null;

function showDeleteModal(id, name) {
    StudentIdToDelete = id;
    document.getElementById('StudentName').textContent = name;
    new bootstrap.Modal(document.getElementById('deleteModal')).show();
}

document.getElementById('confirmDelete').addEventListener('click', function() {
    if (StudentIdToDelete) {
        document.getElementById('delete-form-' + StudentIdToDelete).submit();
    }
});
</script>

@endsection