<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\StudentDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Repositories\StudentRepository;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Response;

class StudentController extends AppBaseController
{
    /** @var  StudentRepository */
    private $studentRepository;

    public function __construct(StudentRepository $studentRepo)
    {
        $this->studentRepository = $studentRepo;
    }

    /**
     * Display a listing of the Student.
     *
     * @param StudentDataTable $studentDataTable
     * @return Response
     */
    public function index(StudentDataTable $studentDataTable)
    {
        return $studentDataTable->render('admin.students.index');
    }

    /**
     * Show the form for creating a new Student.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.students.create', [
            'classes'   => \App\Models\ClassRoom::all()
        ]);
    }

    /**
     * Store a newly created Student in storage.
     *
     * @param CreateStudentRequest $request
     *
     * @return Response
     */
    public function store(CreateStudentRequest $request)
    {
        $input = $request->all();
        $input['period']    = \App\Models\PeriodSetting::getActivePeriod();
        $student = $this->studentRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/students.singular')]));

        return redirect(route('students.index'));
    }

    /**
     * Display the specified Student.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $student = $this->studentRepository->find($id);

        if (empty($student)) {
            Flash::error(__('messages.not_found', ['model' => __('models/students.singular')]));

            return redirect(route('students.index'));
        }

        return view('admin.students.show')->with('student', $student);
    }

    /**
     * Show the form for editing the specified Student.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $student = $this->studentRepository->find($id);

        if (empty($student)) {
            Flash::error(__('messages.not_found', ['model' => __('models/students.singular')]));

            return redirect(route('students.index'));
        }

        return view('admin.students.edit')->with('student', $student);
    }

    /**
     * Update the specified Student in storage.
     *
     * @param  int              $id
     * @param UpdateStudentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStudentRequest $request)
    {
        $student = $this->studentRepository->find($id);

        if (empty($student)) {
            Flash::error(__('messages.not_found', ['model' => __('models/students.singular')]));

            return redirect(route('students.index'));
        }

        $student = $this->studentRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/students.singular')]));

        return redirect(route('students.index'));
    }

    /**
     * Remove the specified Student from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $student = $this->studentRepository->find($id);

        if (empty($student)) {
            Flash::error(__('messages.not_found', ['model' => __('models/students.singular')]));

            return redirect(route('students.index'));
        }

        $this->studentRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/students.singular')]));

        return redirect(route('students.index'));
    }
}
