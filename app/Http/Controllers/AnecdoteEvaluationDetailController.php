<?php

namespace App\Http\Controllers;

use App\DataTables\AnecdoteEvaluationDetailDataTable;
use App\Http\Requests\CreateAnecdoteEvaluationDetailRequest;
use App\Http\Requests\UpdateAnecdoteEvaluationDetailRequest;
use App\Repositories\AnecdoteEvaluationDetailRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Response;

class AnecdoteEvaluationDetailController extends AppBaseController
{
    /** @var  AnecdoteEvaluationDetailRepository */
    private $anecdoteEvaluationDetailRepository;

    public function __construct(AnecdoteEvaluationDetailRepository $anecdoteEvaluationDetailRepo)
    {
        $this->anecdoteEvaluationDetailRepository = $anecdoteEvaluationDetailRepo;
    }

    /**
     * Display a listing of the AnecdoteEvaluationDetail.
     *
     * @param AnecdoteEvaluationDetailDataTable $anecdoteEvaluationDetailDataTable
     * @return Response
     */
    public function index(AnecdoteEvaluationDetailDataTable $anecdoteEvaluationDetailDataTable): Response
    {
        return $anecdoteEvaluationDetailDataTable->render('anecdote_evaluation_details.index');
    }

    /**
     * Show the form for creating a new AnecdoteEvaluationDetail.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('anecdote_evaluation_details.create');
    }

    /**
     * Store a newly created AnecdoteEvaluationDetail in storage.
     *
     * @param CreateAnecdoteEvaluationDetailRequest $request
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CreateAnecdotEvaluationDetailRequest $request)
    {
        $input = $request->all();

        $anecdotEvaluationDetail = $this->anecdoteEvaluationDetailRepository->create($input);

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
        $anecdotEvaluationDetail = $this->anecdoteEvaluationDetailRepository->find($id);

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
        $anecdotEvaluationDetail = $this->anecdoteEvaluationDetailRepository->find($id);

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
        $anecdotEvaluationDetail = $this->anecdoteEvaluationDetailRepository->find($id);

        if (empty($anecdotEvaluationDetail)) {
            Flash::error(__('messages.not_found', ['model' => __('models/anecdotEvaluationDetails.singular')]));

            return redirect(route('anecdotEvaluationDetails.index'));
        }

        $anecdotEvaluationDetail = $this->anecdoteEvaluationDetailRepository->update($request->all(), $id);

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
        $anecdotEvaluationDetail = $this->anecdoteEvaluationDetailRepository->find($id);

        if (empty($anecdotEvaluationDetail)) {
            Flash::error(__('messages.not_found', ['model' => __('models/anecdotEvaluationDetails.singular')]));

            return redirect(route('anecdotEvaluationDetails.index'));
        }

        $this->anecdoteEvaluationDetailRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/anecdotEvaluationDetails.singular')]));

        return redirect(route('anecdotEvaluationDetails.index'));
    }
}
