<?php

namespace App\Http\Controllers\Teacher;

use App\DataTables\EvaluationDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateEvaluationRequest;
use App\Http\Requests\UpdateEvaluationRequest;
use App\Repositories\EvaluationRepository;
use Flash;
use Response;
use function __;
use function redirect;
use function view;

class EvaluationController extends AppBaseController
{
    /** @var  EvaluationRepository */
    private $evaluationRepository;

    public function __construct(EvaluationRepository $evaluationRepo)
    {
        $this->evaluationRepository = $evaluationRepo;
    }

    /**
     * Display a listing of the Evaluation.
     *
     * @param EvaluationDataTable $evaluationDataTable
     * @return Response
     */
    public function index(EvaluationDataTable $evaluationDataTable)
    {
        return $evaluationDataTable->render('teacher.evaluations.index');
    }

    /**
     * Show the form for creating a new Evaluation.
     *
     * @return Response
     */
    public function create()
    {
        return view('teacher.evaluations.create');
    }

    /**
     * Store a newly created Evaluation in storage.
     *
     * @param CreateEvaluationRequest $request
     *
     * @return Response
     */
    public function store(CreateEvaluationRequest $request)
    {
        $input = $request->all();

        $evaluation = $this->evaluationRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/evaluations.singular')]));

        return redirect(route('evaluations.index'));
    }

    /**
     * Display the specified Evaluation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $evaluation = $this->evaluationRepository->find($id);

        if (empty($evaluation)) {
            Flash::error(__('messages.not_found', ['model' => __('models/evaluations.singular')]));

            return redirect(route('evaluations.index'));
        }

        return view('teacher.evaluations.show')->with('evaluation', $evaluation);
    }

    /**
     * Show the form for editing the specified Evaluation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $evaluation = $this->evaluationRepository->find($id);

        if (empty($evaluation)) {
            Flash::error(__('messages.not_found', ['model' => __('models/evaluations.singular')]));

            return redirect(route('evaluations.index'));
        }

        return view('teacher.evaluations.edit')->with('evaluation', $evaluation);
    }

    /**
     * Update the specified Evaluation in storage.
     *
     * @param  int              $id
     * @param UpdateEvaluationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEvaluationRequest $request)
    {
        $evaluation = $this->evaluationRepository->find($id);

        if (empty($evaluation)) {
            Flash::error(__('messages.not_found', ['model' => __('models/evaluations.singular')]));

            return redirect(route('evaluations.index'));
        }

        $evaluation = $this->evaluationRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/evaluations.singular')]));

        return redirect(route('evaluations.index'));
    }

    /**
     * Remove the specified Evaluation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $evaluation = $this->evaluationRepository->find($id);

        if (empty($evaluation)) {
            Flash::error(__('messages.not_found', ['model' => __('models/evaluations.singular')]));

            return redirect(route('evaluations.index'));
        }

        $this->evaluationRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/evaluations.singular')]));

        return redirect(route('evaluations.index'));
    }
}
