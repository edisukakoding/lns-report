<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\StudentDataTable;
use App\Http\Requests\CreateStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\PeriodSetting;
use App\Models\Report;
use App\Models\Student;
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
use Illuminate\Support\Facades\DB;
use Nette\Utils\Json;
use Nette\Utils\JsonException;

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
     * @return Application|Factory|View|Response
     * @throws JsonException
     */
    public function assessment(int $id): Application|Factory|View|Response
    {
        $student        = Student::with('noteAssessments')->findOrFail($id);
        $query          = Report::query()->where('student_id', $id);
        $reports        = $query->get();
        $total_data     = $query->count();
        $baik           = 0;
        $cukup          = 0;
        $perlu_dilatih  = 0;
        $data           = [];
        foreach ($reports as $report) {
            $arr = Json::decode($report->aspect);
            if(!empty($arr->subcategory)) {
                $data[$arr->category][$arr->subcategory][] = ['aspect' => $arr->point, 'value' => $report->value];
            }else {
                $data[$arr->category][] = ['aspect' => $arr->point, 'value' => $report->value];
            }
            match ($report->value) {
              'BAIK'            => $baik++,
              'CUKUP'           => $cukup++,
              'PERLU DILATIH'   => $perlu_dilatih++
            };
        }

//        echo "<ul>";
//        foreach ($data as $key => $value) {
//            echo "<li>" . $key . "</li>";
//            echo "<ul>";
//            foreach ($value as $row => $item) {
//                if(!is_string($row)) {
//                    echo "<li>" . $item['aspect'] . "</li>";
//                }else {
//                    echo "<li>" . $row . "</li>";
////                    print_r($item);
//                    echo "<ul>";
//                    foreach ($item as $asd) {
//                        echo "<li>" . $asd['aspect'] . "</li>";
//                    }
//                    echo "</ul>";
//                }
//            }
//            echo "</ul>";
//        }
//
//        echo "</ul>";
//        die;

//        dd($data);
        $pdf = Pdf::loadView('admin.students.assessment', compact('student', 'data', 'total_data', 'baik', 'cukup', 'perlu_dilatih'));
        return $pdf->stream();
//        return $pdf->download('oba.pdf');
//        return \view('admin.students.assessment');
    }
}
