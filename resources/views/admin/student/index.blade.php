
<x-app-layout>
<div class="container  mx-auto">
    <div class="card shadow mt-10">
        <div class="card-header flex justify-between items-center">
            <h2 class="h3">All Student</h2>
            <a href="{{route('student.create')}}" class="btn btn-primary">Create Student</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th width='2%'>SL</th>
                        <th width='8%'>Full Name</th>
                        <th width='3%'>Email</th>
                        <th width='3%'>Gender</th>
                        <th width='5%'>Photo</th>
                        <th width="8%">Date of birth</th>
                        <th width='11%'>Skills</th>
                        <th width='4%'>Contact Number</th>
                        <th width='4%'>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $i => $student)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>
                            {{$student->first_name." ".$student->last_name}}
                        </td>
                        <td class="text-blue-500">{{$student->email}}</td>
                        <td>{{$student->gender}}</td>
                        <td>

                            <img class="rounded-circle w-14" src="{{ asset($student->photo) }}" alt="{{ $student->first_name }}">
                        </td>
                        <td>{{ \Carbon\Carbon::parse($student->dob)->format('d-m-Y') }}</td>
                        <td>{{$student->skills}}</td>
                        <td>{{$student->contact}}</td>
                        <td class="flex justify-between items-center">
                            <a class="btn btn-success" href="{{route('student.edit', $student->id)}}"><i class="fas fa-edit"></i></a>

                            <form action="{{route('student.delete', $student->id)}}" method="POST" id="delete-student-{{$student->id}}">
                                @csrf
                                @method("delete")
                                <button type="button" class="btn btn-danger" onclick="confirmDelete({{$student->id}});" ><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</x-app-layout>