<x-app-layout>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header flex items-center justify-between">
                <h3 class="h3">Create New Student</h3>
                <a href="{{route('student.index')}}" class="btn btn-primary">All Students</a>
            </div>
            <div class="card-body">
                <form action="{{route('student.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label" for="fname">First Name:</label>
                            <input class="form-control rounded @error('first_name') is-invalid placeholder:text-red-500  @enderror" type="text" name="first_name" id="fname" placeholder="Enter first name" value="{{old('first_name')}}">
                            @error('first_name')
                                <div class="text-danger">{{ ucwords($message) }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="lname">Last Name:</label>
                            <input class="form-control rounded @error('last_name') is-invalid placeholder:text-red-500  @enderror" type="text" name="last_name" id="lname" placeholder="Enter last name" value="{{old('last_name')}}">
                            @error('last_name')
                            <div class="text-danger">{{ ucwords($message) }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="form-label" for="email">Email:</label>
                            <input class="form-control rounded @error('email') is-invalid  placeholder:text-red-500 @enderror" type="email" name="email" id="email" placeholder="Enter email" value="{{old('email')}}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="dob">Date of birth:</label>
                            <input class="form-control rounded @error('dob') is-invalid @enderror" type="date" name="dob" id="dob" value="{{old('dob')}}">
                            @error('dob')
                                <div class="text-danger">{{ ucwords('The Date of birth field is required.') }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="form-label" for="gender">Gender:</label><br>
                            <div class="flex items-center @error('gender') is-invalid placeholder:text-red-500  @enderror">
                                <input @if (old('gender') == 'Male')
                                    checked
                                @endif class="form-radio cursor-pointer" type="radio" name="gender" id="gender" value="Male"><span class="ms-1">Male</span>
                                <input @if (old('gender') == 'Female')
                                checked
                                @endif class="ms-5 form-radio cursor-pointer" type="radio" name="gender" id="gender" value="Female"> <span class="ms-1">Female</span>
                                <input @if (old('gender') == 'Others')
                                checked
                                @endif class="ms-5 form-radio cursor-pointer" type="radio" name="gender" id="gender" value="Others"> <span class="ms-1">Others</span>
                            </div>
                            @error('gender')
                                <div class="text-danger">{{ ucwords($message) }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="skills">Skills:</label> <br>
                            <input @if (old('skills') == 'HTML')
                            checked
                            @endif class="ms-2 form-checkbox"  type="checkbox" name="skills[]" id="skills" value="HTML" > <span class="ms-1">HTML</span>

                            <input @if (old('skills') == 'CSS')
                            checked
                            @endif class="ms-2" type="checkbox" name="skills" id="skills[]" value="CSS"> <span class="ms-1">CSS</span>

                            <input @if (old('skills') == 'JavaScript')
                            checked
                            @endif class="ms-2 form-checkbox"  type="checkbox" name="skills[]" id="skills" value="JavaScript"> <span class="ms-1">JavaScript</span>

                            <input @if (old('skills') == 'PHP')
                            checked
                            @endif class="ms-2 form-checkbox"  type="checkbox" name="skills[]" id="skills" value="PHP"> <span class="ms-1">PHP</span>

                            <input @if (old('skills') == 'MySQL')
                            checked
                            @endif class="ms-2 form-checkbox"  type="checkbox" name="skills[]" id="skills" value="MySQL"> <span class="ms-1">MySQL</span>

                            <input @if (old('skills') == 'Node.js')
                            checked
                            @endif class="ms-2 form-checkbox"  type="checkbox" name="skills[]" id="skills" value="Node.js"> <span class="ms-1">Node.js</span>

                            <input @if (old('skills') == 'Git & Github')
                            checked
                            @endif class="ms-2 form-checkbox"  type="checkbox" name="skills[]" id="skills" value="Git & Github"> <span class="ms-1">Git & Github</span>


                            @error('skills')
                            <div class="text-danger">{{ ucwords($message) }}</div>
                        @enderror
                        </div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="form-label" for="address">Address:</label>
                            <input class="form-control rounded @error('address') is-invalid placeholder:text-red-500 @enderror" type="text" name="address" id="address" placeholder="Enter Address" value="{{old('address')}}">
                            @error('address')
                                <div class="text-danger">{{ ucwords($message) }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="contact">Contact:</label>
                            <input type="text" class="form-control rounded @error('contact') is-invalid placeholder:text-red-500 @enderror" name="contact" id="contact" placeholder="+880000000000" value="{{old('contact')}}">
                            @error('contact')
                            <div class="text-danger">{{ ucwords($message) }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label" for="photo">Your Photo:</label> <br>
                            <input class="" type="file" name="photo" id="photo" value="{{old('photo')}}">

                        </div>
                    </div>
                    <div class="mt-4">
                        <input class="btn btn-primary px-8" type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>