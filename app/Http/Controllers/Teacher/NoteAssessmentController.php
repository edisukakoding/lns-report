<?php

namespace App\Http\Controllers\Teacher;

use App\DataTables\NoteAssessmentDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateNoteAssessmentRequest;
use App\Http\Requests\UpdateNoteAssessmentRequest;
use App\Repositories\NoteAssessmentRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use function __;
use function redirect;
use function view;

class NoteAssessmentController extends AppBaseController
{
    /** @var  NoteAssessmentRepository */
    private NoteAssessmentRepository $noteAssessmentRepository;

    public function __construct(NoteAssessmentRepository $noteAssessmentRepo)
    {
        $this->noteAssessmentRepository = $noteAssessmentRepo;
    }

    /**
     * Display a listing of the NoteAssessment.
     *
     * @param NoteAssessmentDataTable $noteAssessmentDataTable
     * @return mixed
     */
    public function index(NoteAssessmentDataTable $noteAssessmentDataTable): mixed
    {
        return $noteAssessmentDataTable->render('teacher.note_assessments.index');
    }

    /**
     * Show the form for creating a new NoteAssessment.
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        return view('teacher.note_assessments.create');
    }

    /**
     * Store a newly created NoteAssessment in storage.
     *
     * @param CreateNoteAssessmentRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CreateNoteAssessmentRequest $request): Redirector|RedirectResponse|Application
    {
        $input = $request->all();

        $this->noteAssessmentRepository->create($input);

        flash(__('messages.saved', ['model' => __('models/noteAssessments.singular')]), 'success');

        return redirect(route('noteAssessments.index'));
    }

    /**
     * Display the specified NoteAssessment.
     *
     * @param int $id
     * @return View|Factory|Redirector|Application|RedirectResponse
     */
    public function show(int $id): View|Factory|Redirector|Application|RedirectResponse
    {
        $noteAssessment = $this->noteAssessmentRepository->find($id);

        if (empty($noteAssessment)) {
            flash(__('messages.not_found', ['model' => __('models/noteAssessments.singular')]), 'error');

            return redirect(route('noteAssessments.index'));
        }

        return view('teacher.note_assessments.show')->with('noteAssessment', $noteAssessment);
    }

    /**
     * Show the form for editing the specified NoteAssessment.
     *
     * @param int $id
     * @return View|Factory|Redirector|Application|RedirectResponse
     */
    public function edit(int $id): View|Factory|Redirector|Application|RedirectResponse
    {
        $noteAssessment = $this->noteAssessmentRepository->find($id);

        if (empty($noteAssessment)) {
            flash(__('messages.not_found', ['model' => __('models/noteAssessments.singular')]), 'error');

            return redirect(route('noteAssessments.index'));
        }

        return view('teacher.note_assessments.edit')->with('noteAssessment', $noteAssessment);
    }

    /**
     * Update the specified NoteAssessment in storage.
     *
     * @param int $id
     * @param UpdateNoteAssessmentRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function update(int $id, UpdateNoteAssessmentRequest $request): Redirector|RedirectResponse|Application
    {
        $noteAssessment = $this->noteAssessmentRepository->find($id);

        if (empty($noteAssessment)) {
            flash(__('messages.not_found', ['model' => __('models/noteAssessments.singular')]), 'error');

            return redirect(route('noteAssessments.index'));
        }

        $this->noteAssessmentRepository->update($request->all(), $id);

        flash(__('messages.updated', ['model' => __('models/noteAssessments.singular')]), 'success');

        return redirect(route('noteAssessments.index'));
    }

    /**
     * Remove the specified NoteAssessment from storage.
     *
     * @param int $id
     *
     * @return Redirector|Application|RedirectResponse
     * @throws Exception
     */
    public function destroy(int $id): Redirector|Application|RedirectResponse
    {
        $noteAssessment = $this->noteAssessmentRepository->find($id);

        if (empty($noteAssessment)) {
            flash(__('messages.not_found', ['model' => __('models/noteAssessments.singular')]), 'error');

            return redirect(route('noteAssessments.index'));
        }

        $this->noteAssessmentRepository->delete($id);

        flash(__('messages.deleted', ['model' => __('models/noteAssessments.singular')]), 'success');

        return redirect(route('noteAssessments.index'));
    }
}
