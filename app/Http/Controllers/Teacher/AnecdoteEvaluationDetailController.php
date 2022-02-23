<?php

namespace App\Http\Controllers\Teacher;

use App\DataTables\AnecdoteEvaluationDetailDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateAnecdoteEvaluationDetailRequest;
use App\Http\Requests\UpdateAnecdoteEvaluationDetailRequest;
use App\Models\AnecdoteEvaluation;
use App\Repositories\AnecdoteEvaluationDetailRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use function __;
use function redirect;
use function view;

class AnecdoteEvaluationDetailController extends AppBaseController
{
    /** @var  AnecdoteEvaluationDetailRepository */
    private AnecdoteEvaluationDetailRepository $anecdoteEvaluationDetailRepository;

    public function __construct(AnecdoteEvaluationDetailRepository $anecdoteEvaluationDetailRepo)
    {
        $this->anecdoteEvaluationDetailRepository = $anecdoteEvaluationDetailRepo;
    }

    /**
     * Display a listing of the AnecdoteEvaluationDetail.
     *
     * @param AnecdoteEvaluationDetailDataTable $anecdoteEvaluationDetailDataTable
     * @return mixed
     */
    public function index(AnecdoteEvaluationDetailDataTable $anecdoteEvaluationDetailDataTable): mixed
    {
        return $anecdoteEvaluationDetailDataTable->render('teacher.anecdote_evaluation_details.index');
    }

    /**
     * Show the form for creating a new AnecdoteEvaluationDetail.
     * @param Request $request
     * @return Factory|View|Application
     */
    public function create(Request $request): Factory|View|Application
    {
        $anecdoteEvaluation = AnecdoteEvaluation::query()->findOrFail($request->input('anecdote_evaluation_id'));
        return view('teacher.anecdote_evaluation_details.create', compact('anecdoteEvaluation'));
    }

    /**
     * Store a newly created AnecdoteEvaluationDetail in storage.
     *
     * @param CreateAnecdoteEvaluationDetailRequest $request
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CreateAnecdoteEvaluationDetailRequest $request): Redirector|RedirectResponse|Application
    {
        $input = $request->all();

        $this->anecdoteEvaluationDetailRepository->create($input);

        flash(__('messages.saved', ['model' => __('models/anecdoteEvaluationDetails.singular')]), 'success');

        return redirect(route('anecdoteEvaluationDetails.index'));
    }

    /**
     * Display the specified AnecdoteEvaluationDetail.
     *
     * @param int $id
     * @return View|Factory|Redirector|Application|RedirectResponse
     */
    public function show(int $id): View|Factory|Redirector|Application|RedirectResponse
    {
        $anecdoteEvaluationDetail = $this->anecdoteEvaluationDetailRepository->find($id);

        if (empty($anecdoteEvaluationDetail)) {
            flash(__('messages.not_found', ['model' => __('models/anecdoteEvaluationDetails.singular')]), 'error');

            return redirect(route('anecdoteEvaluationDetails.index'));
        }

        return view('teacher.anecdote_evaluation_details.show')->with('anecdoteEvaluationDetail', $anecdoteEvaluationDetail);
    }

    /**
     * Show the form for editing the specified AnecdoteEvaluationDetail.
     *
     * @param int $id
     * @return View|Factory|Redirector|Application|RedirectResponse
     */
    public function edit(int $id): View|Factory|Redirector|Application|RedirectResponse
    {
        $anecdoteEvaluationDetail   = $this->anecdoteEvaluationDetailRepository->find($id);
        $anecdoteEvaluation         = null;
        if (!empty($anecdoteEvaluationDetail->anecdote_evaluation_id)) {
            $anecdoteEvaluation       = AnecdoteEvaluation::query()->findOrFail(id: $anecdoteEvaluationDetail->anecdote_evaluation_id);
        }
        if (empty($anecdoteEvaluationDetail)) {
            flash(__('messages.not_found', ['model' => __('models/anecdoteEvaluationDetails.singular')]), 'error');
            return redirect(url()->previous());
        }
        return view('teacher.anecdote_evaluation_details.edit', compact('anecdoteEvaluationDetail', 'anecdoteEvaluation'));
    }

    /**
     * Update the specified AnecdoteEvaluationDetail in storage.
     *
     * @param int $id
     * @param UpdateAnecdoteEvaluationDetailRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function update(int $id, UpdateAnecdoteEvaluationDetailRequest $request): Redirector|RedirectResponse|Application
    {
        $anecdoteEvaluationDetail = $this->anecdoteEvaluationDetailRepository->find($id);

        if (empty($anecdoteEvaluationDetail)) {
            flash(__('messages.not_found', ['model' => __('models/anecdoteEvaluationDetails.singular')]), 'error');

            return redirect(route('anecdoteEvaluationDetails.index'));
        }

        $this->anecdoteEvaluationDetailRepository->update($request->all(), $id);

        flash(__('messages.updated', ['model' => __('models/anecdoteEvaluationDetails.singular')]), 'success');

        return redirect(route('anecdoteEvaluationDetails.index'));
    }

    /**
     * Remove the specified AnecdoteEvaluationDetail from storage.
     *
     * @param int $id
     *
     * @return Redirector|Application|RedirectResponse
     * @throws Exception
     */
    public function destroy(int $id): Redirector|Application|RedirectResponse
    {
        $anecdoteEvaluationDetail = $this->anecdoteEvaluationDetailRepository->find($id);

        if (empty($anecdoteEvaluationDetail)) {
            flash(__('messages.not_found', ['model' => __('models/anecdoteEvaluationDetails.singular')]), 'error');

            return redirect(route('anecdoteEvaluationDetails.index'));
        }

        $this->anecdoteEvaluationDetailRepository->delete($id);

        flash(__('messages.deleted', ['model' => __('models/anecdoteEvaluationDetails.singular')]), 'success');

        return redirect(route('anecdoteEvaluationDetails.index'));
    }
}
