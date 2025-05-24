<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Auth, File, Storage};
use Intervention\Image\Facades\Image;
use App\Models\Student;

class StudentController extends Controller
{
    public function index() {
        $students = Student::all();
        return view('admin.student.index', compact('students'));
    }

    public function create() {
        return view('admin.student.create');
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'skills' => 'required',
            'contact' => 'required',
            'address' => 'required',

        ]);

        $skills =  $request->skills;
        $stringSkills =  implode(", ", $skills);
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'skills' => $stringSkills,
            'contact' => $request->contact,
            'address' => $request->address,

        ];
        $photo = $request->photo;
        if ($photo) {
            $photoName = $request->first_name ."_".$request->last_name."-". uniqid() . '.' . $photo->getClientOriginalExtension();

            $image = Image::make($photo)->resize(300, 300);

            $path = storage_path('app/public/uploads/students/');

            $image->save($path . $photoName);
            $data["photo"] = "storage/uploads/students/" . $photoName;

        } else {
            $data["photo"] = "storage/uploads/students/empty-user.webp";
        }
        $insert = Student::create($data);
        if($insert) {
            return redirect()->route("student.index")->with('success', 'Student Created Successfully!');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');

        }

    }
    public function edit($id) {
        $student = Student::find($id);
        $studentSkills = explode(", ", $student->skills);
        $allSkills = ['HTML', 'CSS', 'JavaScript', 'PHP', 'MySQL', 'Node.js', 'Git & Github'];


        return view("admin.student.edit", compact("student", "studentSkills", "allSkills"));
    }
    public function update(Request $request, $id) {
        $student = Student::find($id);
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'skills' => 'required',
            'contact' => 'required',
            'address' => 'required',

        ]);
        $skills =  $request->skills;
        $stringSkills =  implode(", ", $skills);
        // data
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->email = $request->email;
        $student->skills = $stringSkills;
        $student->contact = $request->contact;
        $student->address = $request->address;

        $photo = $request->photo;
        $img= Student::find($id)->photo;

        if ($photo) {

            // remove current photo
            $oldImagePath = public_path($img); // full path
            if (File::exists($oldImagePath)) {
                if (File::basename($img) != "empty-user.webp") {
                    File::delete($oldImagePath);
                }
            }


            $photoName = $request->first_name ."_".$request->last_name."-". uniqid() . '.' . $photo->getClientOriginalExtension();

            $image = Image::make($photo)->resize(300, 300);

            $path = storage_path('app/public/uploads/students/');

            $image->save($path . $photoName);
            $student->photo = "storage/uploads/students/" . $photoName;

        }
        $update = $student->save();
        if($update) {
            return redirect()->route("student.index")->with('success', 'Student Updated Successfully!');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');

        }
    }


    public function destroy($id) {
        $img= Student::find($id)->photo;
        // remove  photo
        $oldImagePath = public_path($img); // full path
        if (File::exists($oldImagePath)) {
            if (File::basename($img) != "empty-user.webp") {
                File::delete($oldImagePath);
            }
        }
        $delete = Student::find($id)->delete();
        if($delete) {
            return redirect()->back()->with('success', 'Student Deleted Successfully!');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');

        }
    }
}
