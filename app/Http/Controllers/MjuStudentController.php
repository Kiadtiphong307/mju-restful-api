<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\MjuStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MjuStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {

        // $majorsData = [
        //     [
        //         'major_id' => '123',
        //         'name' => 'วิทยาการคอมพิวเตอร์',
        //         'name_en' => 'Computer Science',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'major_id' => '124',
        //         'name' => 'เทคโนโลยีสารสนเทศ',
        //         'name_en' => 'Information Technology',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'major_id' => '125',
        //         'name' => 'วิศวกรรมซอฟต์แวร์',
        //         'name_en' => 'Software Engineering',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'major_id' => '126',
        //         'name' => 'วิทยาศาสตร์ข้อมูล',
        //         'name_en' => 'Data Science',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'major_id' => '127',
        //         'name' => 'เครือข่ายคอมพิวเตอร์',
        //         'name_en' => 'Computer Networking',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     ];

        //     DB::table('major')->insert($majorsData);

        {
            //
            static $students_value = null;
            $students = MjuStudent :: major_id ();
            return $students_value;

            }




    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_code' => 'required|string|max:15',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'first_name_en' => 'required|string|max:50',
            'last_name_en'=>'required|string|max:50',
            'major_id' => 'required|exists:majors,major_id',
            'idcard' => 'required||digits:13',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'birthdate' => 'required|date',
            'gender' => 'required|string|max:1'

        ]);

        MjuStudent::create($validated);

        return response()->json(['message' => 'Student created successfully'], 201);
    }

    public function show(Request $request,MjuStudent $mjuStudent)
    {
        //
        $student_code = $request->mju;
        $mjuStudent = MjuStudent::where('student_code',$student_code)->get();

        return response()->json(
            [
                'message'=>'Student get successfully',
                'get Data by'=>'Kiadtiphong',
                'data'=>$mjuStudent
            ],200);

    }

    public function update(Request $request, MjuStudent $mjuStudent)
    {
        $validated = $request->validate([
            'student_code' => 'required|string|max:15',
            'first_name' => 'required|string|max:50',
            'first_name_en' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'last_name_en'=>'required|string|max:50',
            'major_id' => 'required|exists:majors,major_id',
            'idcard' => 'required||digits:13',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'gender' => 'required|string',
            'birthdate' => 'required|date',
        ]);


        $mjuStudent = MjuStudent::where('student_code', $validated['student_code'])->first();

        if ($mjuStudent) {
            $mjuStudent->update($validated);

            return response()->json(['message' => 'Student Update successfully', 'data' => $mjuStudent], 200);
    } else {
            return response()->json(['message' => 'Student not found'], 404);
    }

    }


    public function destroy(MjuStudent $mju)
    {


        // $mjuStudent = MjuStudent::where('student_code' ,$student_code)->delete();
        //
        $mju->delete();

        return response()->json([
        'message' => 'Student deleted successfully',
        'data' => $mju
        ], 200);


}

}
