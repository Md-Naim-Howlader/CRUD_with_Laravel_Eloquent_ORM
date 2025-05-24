<x-app-layout>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header flex items-center justify-between">
                <h3 class="h3">Edit Student</h3>
                <a href="{{route('student.index')}}" class="btn btn-primary">All Students</a>
            </div>
            <div class="card-body">
                <form action="{{route('student.update', $student->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label" for="fname">First Name:</label>
                            <input class="form-control rounded @error('first_name') is-invalid placeholder:text-red-500  @enderror" type="text" name="first_name" id="fname" placeholder="Enter first name" value="{{$student->first_name}}">
                            @error('first_name')
                                <div class="text-danger">{{ ucwords($message) }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="lname">Last Name:</label>
                            <input class="form-control rounded @error('last_name') is-invalid placeholder:text-red-500  @enderror" type="text" name="last_name" id="lname" placeholder="Enter last name" value="{{$student->last_name}}">
                            @error('last_name')
                            <div class="text-danger">{{ ucwords($message) }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="form-label" for="email">Email:</label>
                            <input class="form-control rounded @error('email') is-invalid  placeholder:text-red-500 @enderror" type="email" name="email" id="email" placeholder="Enter email" value="{{$student->email}}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="dob">Date of birth:</label>
                            <input class="form-control rounded @error('dob') is-invalid @enderror" type="date" name="dob" id="dob" value="{{$student->dob}}">
                            @error('dob')
                                <div class="text-danger">{{ ucwords('The Date of birth field is required.') }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="form-label" for="gender">Gender:</label><br>
                            <div class="flex items-center @error('gender') is-invalid placeholder:text-red-500  @enderror">
                                <input @if ($student->gender == 'Male')
                                    checked
                                @endif class="form-radio cursor-pointer" type="radio" name="gender" id="gender" value="Male"><span class="ms-1">Male</span>
                                <input @if ($student->gender == 'Female')
                                checked
                                @endif class="ms-5 form-radio cursor-pointer" type="radio" name="gender" id="gender" value="Female"> <span class="ms-1">Female</span>
                                <input @if ($student->gender== 'Others')
                                checked
                                @endif class="ms-5 form-radio cursor-pointer" type="radio" name="gender" id="gender" value="Others"> <span class="ms-1">Others</span>
                            </div>
                            @error('gender')
                                <div class="text-danger">{{ ucwords($message) }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">

                            <label class="form-label" for="skills">Skills:</label> <br>
                            @foreach ($allSkills as $skill)

                                <input
                                    type="checkbox"
                                    class="ms-2 form-checkbox"
                                    name="skills[]"
                                    value="{{ $skill }}"
                                    @if (in_array($skill, $studentSkills))
                                       checked
                                    @endif
                                >
                                <span class="ms-1">{{ $skill }}</span>
                        @endforeach
                            @error('skills')
                            <div class="text-danger">{{ ucwords($message) }}</div>
                        @enderror
                        </div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="form-label" for="address">Address:</label>
                            <input class="form-control rounded @error('address') is-invalid placeholder:text-red-500 @enderror" type="text" name="address" id="address" placeholder="Enter Address" value="{{$student->address}}">
                            @error('address')
                                <div class="text-danger">{{ ucwords($message) }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="contact">Contact:</label>
                            <input type="text" class="form-control rounded @error('contact') is-invalid placeholder:text-red-500 @enderror" name="contact" id="contact" placeholder="+880000000000" value="{{$student->contact}}">
                            @error('contact')
                            <div class="text-danger">{{ ucwords($message) }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-6">
                            <label class="form-label" for="photo">Your Photo:</label> <br>
                            <input class="" type="file" name="photo" id="photo">

                        </div>
                        <div class="col-md-6 flex justify-center items-center">
                            <img class="h-auto w-[150px] rounded-circle" src="{{asset($student->photo)}}" alt="student photo">
                        </div>
                    </div>
                    <div class="mt-4">
                        <input class="btn btn-primary px-8" type="submit" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>