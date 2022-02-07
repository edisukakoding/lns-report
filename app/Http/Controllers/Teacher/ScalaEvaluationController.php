<?php

namespace App\Http\Controllers\Teacher;

use App\DataTables\ScalaEvaluationDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateScalaEvaluationRequest;
use App\Http\Requests\UpdateScalaEvaluationRequest;
use App\Repositories\ScalaEvaluationRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Response;
use Laracasts\Flash\Flash;
use function __;
use function redirect;
use function view;

class ScalaEvaluationController extends AppBaseController
{
    /** @var  ScalaEvaluationRepository */
    private $scalaEvaluationRepository;

    public function __construct(ScalaEvaluationRepository $scalaEvaluationRepo)
    {
        $this->scalaEvaluationRepository = $scalaEvaluationRepo;
    }

    /**
     * Display a listing of the ScalaEvaluation.
     *
     * @param ScalaEvaluationDataTable $scalaEvaluationDataTable
     * @return Response
     */
    public function index(ScalaEvaluationDataTable $scalaEvaluationDataTable): Response
    {
        return $scalaEvaluationDataTable->render('teacher.scala_evaluations.index');
    }

    /**
     * Show the form for creating a new ScalaEvaluation.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('teacher.scala_evaluations.create');
    }

    /**
     * Store a newly created ScalaEvaluation in storage.
     *
     * @param CreateScalaEvaluationRequest $request
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CreateScalaEvaluationRequest $request)
    {
        $input = $request->all();

        $this->scalaEvaluationRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/scalaEvaluations.singular')]));

        return redirect(route('scalaEvaluations.index'));
    }

    /**
     * Display the specified ScalaEvaluation.
     *
     * @param int $id
     *
     * @return Application|Factory|Redirector|RedirectResponse|View
     */
    public function show(int $id)
    {
        $scalaEvaluation = $this->scalaEvaluationRepository->find($id);

        if (empty($scalaEvaluation)) {
            Flash::error(__('messages.not_found', ['model' => __('models/scalaEvaluations.singular')]));

            return redirect(route('scalaEvaluations.index'));
        }

        return view('teacher.scala_evaluations.show')->with('scalaEvaluation', $scalaEvaluation);
    }

    /**
     * Show the form for editing the specified ScalaEvaluation.
     *
     * @param int $id
     *
     * @return Application|Factory|Redirector|RedirectResponse|View
     */
    public function edit(int $id)
    {
        $scalaEvaluation = $this->scalaEvaluationRepository->find($id);

        if (empty($scalaEvaluation)) {
            Flash::error(__('messages.not_found', ['model' => __('models/scalaEvaluations.singular')]));

            return redirect(route('scalaEvaluations.index'));
        }

        return view('teacher.scala_evaluations.edit')->with('scalaEvaluation', $scalaEvaluation);
    }

    /**
     * Update the specified ScalaEvaluation in storage.
     *
     * @param int $id
     * @param UpdateScalaEvaluationRequest $request
     *
     * @return Application|Redirector|RedirectResponse
     */
    public function update(int $id, UpdateScalaEvaluationRequest $request)
    {
        $scalaEvaluation = $this->scalaEvaluationRepository->find($id);

        if (empty($scalaEvaluation)) {
            Flash::error(__('messages.not_found', ['model' => __('models/scalaEvaluations.singular')]));

            return redirect(route('scalaEvaluations.index'));
        }

        $scalaEvaluation = $this->scalaEvaluationRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/scalaEvaluations.singular')]));

        return redirect(route('scalaEvaluations.index'));
    }

    /**
     * Remove the specified ScalaEvaluation from storage.
     *
     * @param int $id
     *
     * @return Application|Redirector|RedirectResponse
     * @throws Exception
     */
    public function destroy(int $id)
    {
        $scalaEvaluation = $this->scalaEvaluationRepository->find($id);

        if (empty($scalaEvaluation)) {
            Flash::error(__('messages.not_found', ['model' => __('models/scalaEvaluations.singular')]));

            return redirect(route('scalaEvaluations.index'));
        }

        $this->scalaEvaluationRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/scalaEvaluations.singular')]));

        return redirect(route('scalaEvaluations.index'));
    }
}
