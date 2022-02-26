<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\StudentDataTable;
use App\Http\Requests\CreateStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\PeriodSetting;
use App\Repositories\StudentRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\AppBaseController;

class StudentController extends AppBaseController
{
    /** @var  StudentRepository */
    private StudentRepository $studentRepository;

    public function __construct(StudentRepository $studentRepo)
    {
        $this->studentRepository = $studentRepo;
    }

    /**
     * Display a listing of the Student.
     *
     * @param StudentDataTable $studentDataTable
     * @return mixed
     */
    public function index(StudentDataTable $studentDataTable): mixed
    {
        return $studentDataTable->render('admin.students.index');
    }

    /**
     * Show the form for creating a new Student.
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        return view('admin.students.create');
    }

    /**
     * Store a newly created Student in storage.
     *
     * @param CreateStudentRequest $request
     * @return Redirector|Application|RedirectResponse
     */
    public function store(CreateStudentRequest $request): Redirector|Application|RedirectResponse
    {
        $input = $request->all();
        $input['period']    = PeriodSetting::getActivePeriod();
        $this->studentRepository->create($input);

        flash(__('messages.saved', ['model' => __('models/students.singular')]), 'success');

        return redirect(route('students.index'));
    }

    /**
     * Display the specified Student.
     *
     * @param int $id
     * @return View|Factory|Redirector|Application|RedirectResponse
     */
    public function show(int $id): View|Factory|Redirector|Application|RedirectResponse
    {
        $student = $this->studentRepository->find($id);

        if (empty($student)) {
            flash(__('messages.not_found', ['model' => __('models/students.singular')]), 'error');

            return redirect(route('students.index'));
        }

        return view('admin.students.show')->with('student', $student);
    }

    /**
     * Show the form for editing the specified Student.
     *
     * @param int $id
     * @return View|Factory|Redirector|Application|RedirectResponse
     */
    public function edit(int $id): View|Factory|Redirector|Application|RedirectResponse
    {
        $student = $this->studentRepository->find($id);

        if (empty($student)) {
            flash(__('messages.not_found', ['model' => __('models/students.singular')]), 'error');

            return redirect(route('students.index'));
        }

        return view('admin.students.edit')->with('student', $student);
    }

    /**
     * Update the specified Student in storage.
     *
     * @param int $id
     * @param UpdateStudentRequest $request
     * @return Redirector|Application|RedirectResponse
     */
    public function update(int $id, UpdateStudentRequest $request): Redirector|Application|RedirectResponse
    {
        $student = $this->studentRepository->find($id);

        if (empty($student)) {
            flash(__('messages.not_found', ['model' => __('models/students.singular')]), 'error');

            return redirect(route('students.index'));
        }

        $this->studentRepository->update($request->all(), $id);

        flash(__('messages.updated', ['model' => __('models/students.singular')]), 'success');

        return redirect(route('students.index'));
    }

    /**
     * Remove the specified Student from storage.
     *
     * @param int $id
     * @return Redirector|Application|RedirectResponse
     * @throws Exception
     */
    public function destroy(int $id): Redirector|Application|RedirectResponse
    {
        $student = $this->studentRepository->find($id);

        if (empty($student)) {
            flash(__('messages.not_found', ['model' => __('models/students.singular')]), 'error');

            return redirect(route('students.index'));
        }

        $this->studentRepository->delete($id);

        flash(__('messages.deleted', ['model' => __('models/students.singular')]), 'success');

        return redirect(route('students.index'));
    }

    /**
     * @param int $id
     * @return Response
     */
    public function assessment(int $id): Response
    {
        $pdf = Pdf::setOptions(['isPhpEnabled' => true])->loadView('admin.students.assessment', compact('id'));
        return $pdf->stream();
//        return $pdf->download('oba.pdf');
//        return \view('admin.students.assessment');
    }
}
