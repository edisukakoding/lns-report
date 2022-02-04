<?php

namespace App\Http\Controllers;

use App\DataTables\AnecdoteEvaluationDetailDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAnecdotEvaluationDetailRequest;
use App\Http\Requests\UpdateAnecdoteEvaluationDetailRequest;
use App\Repositories\AnecdotEvaluationDetailRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AnecdotEvaluationDetailController extends AppBaseController
{
    /** @var  AnecdotEvaluationDetailRepository */
    private $anecdotEvaluationDetailRepository;

    public function __construct(AnecdotEvaluationDetailRepository $anecdotEvaluationDetailRepo)
    {
        $this->anecdotEvaluationDetailRepository = $anecdotEvaluationDetailRepo;
    }

    /**
     * Display a listing of the AnecdotEvaluationDetail.
     *
     * @param AnecdoteEvaluationDetailDataTable $anecdotEvaluationDetailDataTable
     * @return Response
     */
    public function index(AnecdoteEvaluationDetailDataTable $anecdotEvaluationDetailDataTable)
    {
        return $anecdotEvaluationDetailDataTable->render('anecdot_evaluation_details.index');
    }

    /**
     * Show the form for creating a new AnecdotEvaluationDetail.
     *
     * @return Response
     */
    public function create()
    {
        return view('anecdot_evaluation_details.create');
    }

    /**
     * Store a newly created AnecdotEvaluationDetail in storage.
     *
     * @param CreateAnecdotEvaluationDetailRequest $request
     *
     * @return Response
     */
    public function store(CreateAnecdotEvaluationDetailRequest $request)
    {
        $input = $request->all();

        $anecdotEvaluationDetail = $this->anecdotEvaluationDetailRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/anecdotEvaluationDetails.singular')]));

        return redirect(route('anecdotEvaluationDetails.index'));
    }

    /**
     * Display the specified AnecdotEvaluationDetail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $anecdotEvaluationDetail = $this->anecdotEvaluationDetailRepository->find($id);

        if (empty($anecdotEvaluationDetail)) {
            Flash::error(__('messages.not_found', ['model' => __('models/anecdotEvaluationDetails.singular')]));

            return redirect(route('anecdotEvaluationDetails.index'));
        }

        return view('anecdot_evaluation_details.show')->with('anecdotEvaluationDetail', $anecdotEvaluationDetail);
    }

    /**
     * Show the form for editing the specified AnecdotEvaluationDetail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $anecdotEvaluationDetail = $this->anecdotEvaluationDetailRepository->find($id);

        if (empty($anecdotEvaluationDetail)) {
            Flash::error(__('messages.not_found', ['model' => __('models/anecdotEvaluationDetails.singular')]));

            return redirect(route('anecdotEvaluationDetails.index'));
        }

        return view('anecdot_evaluation_details.edit')->with('anecdotEvaluationDetail', $anecdotEvaluationDetail);
    }

    /**
     * Update the specified AnecdotEvaluationDetail in storage.
     *
     * @param  int              $id
     * @param UpdateAnecdoteEvaluationDetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnecdoteEvaluationDetailRequest $request)
    {
        $anecdotEvaluationDetail = $this->anecdotEvaluationDetailRepository->find($id);

        if (empty($anecdotEvaluationDetail)) {
            Flash::error(__('messages.not_found', ['model' => __('models/anecdotEvaluationDetails.singular')]));

            return redirect(route('anecdotEvaluationDetails.index'));
        }

        $anecdotEvaluationDetail = $this->anecdotEvaluationDetailRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/anecdotEvaluationDetails.singular')]));

        return redirect(route('anecdotEvaluationDetails.index'));
    }

    /**
     * Remove the specified AnecdotEvaluationDetail from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $anecdotEvaluationDetail = $this->anecdotEvaluationDetailRepository->find($id);

        if (empty($anecdotEvaluationDetail)) {
            Flash::error(__('messages.not_found', ['model' => __('models/anecdotEvaluationDetails.singular')]));

            return redirect(route('anecdotEvaluationDetails.index'));
        }

        $this->anecdotEvaluationDetailRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/anecdotEvaluationDetails.singular')]));

        return redirect(route('anecdotEvaluationDetails.index'));
    }
}
