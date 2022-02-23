<?php

namespace App\Http\Controllers\Teacher;

use App\DataTables\AnecdoteEvaluationDataTable;
use App\DataTables\AnecdoteEvaluationDetailDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateAnecdoteEvaluationRequest;
use App\Http\Requests\UpdateAnecdoteEvaluationRequest;
use App\Repositories\AnecdoteEvaluationRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use function __;
use function redirect;
use function view;

class AnecdoteEvaluationController extends AppBaseController
{
    /** @var  AnecdoteEvaluationRepository */
    private AnecdoteEvaluationRepository $anecdoteEvaluationRepository;

    public function __construct(AnecdoteEvaluationRepository $anecdoteEvaluationRepo)
    {
        $this->anecdoteEvaluationRepository = $anecdoteEvaluationRepo;
    }

    /**
     * Display a listing of the AnecdoteEvaluation.
     *
     * @param AnecdoteEvaluationDataTable $anecdoteEvaluationDataTable
     * @return mixed
     */
    public function index(AnecdoteEvaluationDataTable $anecdoteEvaluationDataTable): mixed
    {
        return $anecdoteEvaluationDataTable->render('teacher.anecdote_evaluations.index');
    }

    /**
     * Show the form for creating a new AnecdoteEvaluation.
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        return view('teacher.anecdote_evaluations.create');
    }

    /**
     * Store a newly created AnecdoteEvaluation in storage.
     *
     * @param CreateAnecdoteEvaluationRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CreateAnecdoteEvaluationRequest $request): Redirector|RedirectResponse|Application
    {
        $input              = $request->all();
        $input['user_id']   = Auth::id();
        $this->anecdoteEvaluationRepository->create($input);

        flash(__('messages.saved', ['model' => __('models/anecdoteEvaluations.singular')]), 'success');

        return redirect(route('anecdoteEvaluations.index'));
    }

    /**
     * Display the specified AnecdoteEvaluation.
     *
     * @param int $id
     * @param AnecdoteEvaluationDetailDataTable $anecdoteEvaluationDetailDataTable
     * @return Application|RedirectResponse|Redirector|mixed
     */
    public function show(int $id, AnecdoteEvaluationDetailDataTable $anecdoteEvaluationDetailDataTable): mixed
    {
        $anecdoteEvaluation = $this->anecdoteEvaluationRepository->find($id);

        if (empty($anecdoteEvaluation)) {
            flash(__('messages.not_found', ['model' => __('models/anecdoteEvaluations.singular')]), 'error');

            return redirect(route('anecdoteEvaluations.index'));
        }

        return $anecdoteEvaluationDetailDataTable->render('teacher.anecdote_evaluations.show', compact('anecdoteEvaluation'));
//        return view('teacher.anecdote_evaluations.show')->with('anecdoteEvaluation', $anecdoteEvaluation);
    }

    /**
     * Show the form for editing the specified AnecdoteEvaluation.
     *
     * @param int $id
     * @return View|Factory|Redirector|Application|RedirectResponse
     */
    public function edit(int $id): View|Factory|Redirector|Application|RedirectResponse
    {
        $anecdoteEvaluation = $this->anecdoteEvaluationRepository->find($id);

        if (empty($anecdoteEvaluation)) {
            flash(__('messages.not_found', ['model' => __('models/anecdoteEvaluations.singular')]), 'error');

            return redirect(route('anecdoteEvaluations.index'));
        }

        return view('teacher.anecdote_evaluations.edit')->with('anecdoteEvaluation', $anecdoteEvaluation);
    }

    /**
     * Update the specified AnecdoteEvaluation in storage.
     *
     * @param int $id
     * @param UpdateAnecdoteEvaluationRequest $request
     * @return Redirector|Application|RedirectResponse
     */
    public function update(int $id, UpdateAnecdoteEvaluationRequest $request): Redirector|Application|RedirectResponse
    {
        $anecdoteEvaluation = $this->anecdoteEvaluationRepository->find($id);

        if (empty($anecdoteEvaluation)) {
            flash(__('messages.not_found', ['model' => __('models/anecdoteEvaluations.singular')]), 'error');

            return redirect(route('anecdoteEvaluations.index'));
        }

        $this->anecdoteEvaluationRepository->update($request->all(), $id);

        flash(__('messages.updated', ['model' => __('models/anecdoteEvaluations.singular')]), 'success');

        return redirect(route('anecdoteEvaluations.index'));
    }

    /**
     * Remove the specified AnecdoteEvaluation from storage.
     *
     * @param int $id
     * @return Redirector|Application|RedirectResponse
     * @throws Exception
     */
    public function destroy(int $id): Redirector|Application|RedirectResponse
    {
        $anecdoteEvaluation = $this->anecdoteEvaluationRepository->find($id);

        if (empty($anecdoteEvaluation)) {
            flash(__('messages.not_found', ['model' => __('models/anecdoteEvaluations.singular')]), 'error');

            return redirect(route('anecdoteEvaluations.index'));
        }

        $this->anecdoteEvaluationRepository->delete($id);

        flash(__('messages.deleted', ['model' => __('models/anecdoteEvaluations.singular')]), 'success');

        return redirect(route('anecdoteEvaluations.index'));
    }
}
