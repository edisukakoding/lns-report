<?php

namespace App\Http\Controllers;

use App\DataTables\AnecdoteEvaluationDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAnecdoteEvaluationRequest;
use App\Http\Requests\UpdateAnecdoteEvaluationRequest;
use App\Repositories\AnecdoteEvaluationRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AnecdoteEvaluationController extends AppBaseController
{
    /** @var  AnecdoteEvaluationRepository */
    private $anecdoteEvaluationRepository;

    public function __construct(AnecdoteEvaluationRepository $anecdotEvaluationRepo)
    {
        $this->anecdoteEvaluationRepository = $anecdotEvaluationRepo;
    }

    /**
     * Display a listing of the AnecdoteEvaluation.
     *
     * @param AnecdoteEvaluationDataTable $anecdotEvaluationDataTable
     * @return Response
     */
    public function index(AnecdoteEvaluationDataTable $anecdoteEvaluationDataTable)
    {
        return $anecdoteEvaluationDataTable->render('anecdote_evaluations.index');
    }

    /**
     * Show the form for creating a new AnecdoteEvaluation.
     *
     * @return Response
     */
    public function create()
    {
        return view('anecdote_evaluations.create');
    }

    /**
     * Store a newly created AnecdoteEvaluation in storage.
     *
     * @param CreateAnecdoteEvaluationRequest $request
     *
     * @return Response
     */
    public function store(CreateAnecdoteEvaluationRequest $request)
    {
        $input = $request->all();

        $anecdotEvaluation = $this->anecdotEvaluationRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/anecdotEvaluations.singular')]));

        return redirect(route('anecdoteEvaluations.index'));
    }

    /**
     * Display the specified AnecdoteEvaluation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $anecdotEvaluation = $this->anecdotEvaluationRepository->find($id);

        if (empty($anecdotEvaluation)) {
            Flash::error(__('messages.not_found', ['model' => __('models/anecdotEvaluations.singular')]));

            return redirect(route('anecdoteEvaluations.index'));
        }

        return view('anecdote_evaluations.show')->with('anecdotEvaluation', $anecdotEvaluation);
    }

    /**
     * Show the form for editing the specified AnecdoteEvaluation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $anecdotEvaluation = $this->anecdotEvaluationRepository->find($id);

        if (empty($anecdotEvaluation)) {
            Flash::error(__('messages.not_found', ['model' => __('models/anecdotEvaluations.singular')]));

            return redirect(route('anecdoteEvaluations.index'));
        }

        return view('anecdote_evaluations.edit')->with('anecdotEvaluation', $anecdotEvaluation);
    }

    /**
     * Update the specified AnecdoteEvaluation in storage.
     *
     * @param  int              $id
     * @param UpdateAnecdoteEvaluationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnecdoteEvaluationRequest $request)
    {
        $anecdotEvaluation = $this->anecdotEvaluationRepository->find($id);

        if (empty($anecdotEvaluation)) {
            Flash::error(__('messages.not_found', ['model' => __('models/anecdoteEvaluations.singular')]));

            return redirect(route('anecdoteEvaluations.index'));
        }

        $anecdotEvaluation = $this->anecdotEvaluationRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/anecdoteEvaluations.singular')]));

        return redirect(route('anecdoteEvaluations.index'));
    }

    /**
     * Remove the specified AnecdoteEvaluation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $anecdotEvaluation = $this->anecdotEvaluationRepository->find($id);

        if (empty($anecdotEvaluation)) {
            Flash::error(__('messages.not_found', ['model' => __('models/anecdotEvaluations.singular')]));

            return redirect(route('anecdoteEvaluations.index'));
        }

        $this->anecdotEvaluationRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/anecdoteEvaluations.singular')]));

        return redirect(route('anecdoteEvaluations.index'));
    }
}
