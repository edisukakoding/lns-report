<?php

namespace App\Http\Controllers\Teacher;

use App\DataTables\EvaluationDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateEvaluationRequest;
use App\Http\Requests\UpdateEvaluationRequest;
use App\Models\PeriodSetting;
use App\Models\ScalaEvaluation;
use App\Repositories\EvaluationRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Nette\Utils\Json;
use Nette\Utils\JsonException;
use function __;
use function flash;
use function redirect;
use function view;

class EvaluationController extends AppBaseController
{
    /** @var  EvaluationRepository */
    private EvaluationRepository $evaluationRepository;

    public function __construct(EvaluationRepository $evaluationRepo)
    {
        $this->evaluationRepository = $evaluationRepo;
    }

    /**
     * Display a listing of the Evaluation.
     *
     * @param EvaluationDataTable $evaluationDataTable
     * @return mixed
     */
    public function index(EvaluationDataTable $evaluationDataTable): mixed
    {
        return $evaluationDataTable->render('teacher.evaluations.index');
    }

    /**
     * Show the form for creating a new Evaluation.
     *
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        return view('teacher.evaluations.create');
    }

    /**
     * Store a newly created Evaluation in storage.
     *
     * @param CreateEvaluationRequest $request
     * @return Redirector|Application|RedirectResponse
     */
    public function store(CreateEvaluationRequest $request): Redirector|Application|RedirectResponse
    {

        $input              = $request->all();
        $input['user_id']   = Auth::user()->id;
        $input['period']    = PeriodSetting::getActivePeriod();
        $this->evaluationRepository->create($input);
        flash(__('messages.saved', ['model' => __('models/evaluations.singular')]), 'success');
        return redirect(route('evaluations.index'));
    }

    /**
     * Display the specified Evaluation.
     *
     * @param int $id
     * @return View|Factory|Redirector|Application|RedirectResponse
     */
    public function show(int $id): View|Factory|Redirector|Application|RedirectResponse
    {
        $evaluation = $this->evaluationRepository->find($id);

        if (empty($evaluation)) {
            flash(__('messages.not_found', ['model' => __('models/evaluations.singular')]), 'error');
            return redirect(route('evaluations.index'));
        }
        return view('teacher.evaluations.show')->with('evaluation', $evaluation);
    }

    /**
     * Show the form for editing the specified Evaluation.
     *
     * @param int $id
     * @return View|Factory|Redirector|Application|RedirectResponse
     */
    public function edit(int $id): View|Factory|Redirector|Application|RedirectResponse
    {
        $evaluation = $this->evaluationRepository->find($id);

        if (empty($evaluation)) {
            flash(__('messages.not_found', ['model' => __('models/evaluations.singular')]), 'error');
            return redirect(route('evaluations.index'));
        }

        return view('teacher.evaluations.edit')->with('evaluation', $evaluation);
    }

    /**
     * Update the specified Evaluation in storage.
     *
     * @param int $id
     * @param UpdateEvaluationRequest $request
     * @return Redirector|Application|RedirectResponse
     */
    public function update(int $id, UpdateEvaluationRequest $request): Redirector|Application|RedirectResponse
    {
        $evaluation = $this->evaluationRepository->find($id);

        if (empty($evaluation)) {
            flash(__('messages.not_found', ['model' => __('models/evaluations.singular')]), 'error');
            return redirect(route('evaluations.index'));
        }

        $this->evaluationRepository->update($request->all(), $id);

        flash(__('messages.updated', ['model' => __('models/evaluations.singular')]), 'success');

        return redirect(route('evaluations.index'));
    }

    /**
     * Remove the specified Evaluation from storage.
     *
     * @param int $id
     *
     * @return Redirector|Application|RedirectResponse
     * @throws Exception
     */
    public function destroy(int $id): Redirector|Application|RedirectResponse
    {
        $evaluation = $this->evaluationRepository->find($id);
        if (empty($evaluation)) {
            flash(__('messages.not_found', ['model' => __('models/evaluations.singular')]), 'error');
            return redirect(route('evaluations.index'));
        }
        $this->evaluationRepository->delete($id);
        flash(__('messages.deleted', ['model' => __('models/evaluations.singular')]), 'success');
        return redirect(route('evaluations.index'));
    }

    /**
     * @throws JsonException
     */
    public function getScalaEvaluation(\Illuminate\Http\Request $request): string
    {
        $search = '%""%';
        if($request->has('term')) {
            $search = "%{$request->input('term')}%";
        }
        $query      = ScalaEvaluation::with('student.classRoom')
            ->where('user_id', Auth::user()->id)
            ->where('indicator', 'like', $search);
        $rawSql     = $query->toSql();
        $results = [];
        foreach ($query->get() as $row) {
            $results[] = ['id' => $row->id, 'text' => $row->student->name . ' ( ' . $row->student->classRoom->name . ' )' . ' | ' . $row->indicator];
        }
        $data['results']    = $results;
        $data['query']      = $rawSql;
        $data['request']    = $search;

        return Json::encode($data);
    }
}
