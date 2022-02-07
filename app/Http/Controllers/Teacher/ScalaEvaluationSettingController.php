<?php

namespace App\Http\Controllers\Teacher;

use App\DataTables\ScalaEvaluationSettingDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateScalaEvaluationSettingRequest;
use App\Http\Requests\UpdateScalaEvaluationSettingRequest;
use App\Repositories\ScalaEvaluationSettingRepository;
use Illuminate\Support\Facades\Response;
use Laracasts\Flash\Flash;
use function __;
use function redirect;
use function view;

class ScalaEvaluationSettingController extends AppBaseController
{
    /** @var  ScalaEvaluationSettingRepository */
    private $scalaEvaluationSettingRepository;

    public function __construct(ScalaEvaluationSettingRepository $scalaEvaluationSettingRepo)
    {
        $this->scalaEvaluationSettingRepository = $scalaEvaluationSettingRepo;
    }

    /**
     * Display a listing of the ScalaEvaluationSetting.
     *
     * @param ScalaEvaluationSettingDataTable $scalaEvaluationSettingDataTable
     * @return Response
     */
    public function index(ScalaEvaluationSettingDataTable $scalaEvaluationSettingDataTable)
    {
        return $scalaEvaluationSettingDataTable->render('teacher.scala_evaluation_settings.index');
    }

    /**
     * Show the form for creating a new ScalaEvaluationSetting.
     *
     * @return Response
     */
    public function create()
    {
        return view('teacher.scala_evaluation_settings.create');
    }

    /**
     * Store a newly created ScalaEvaluationSetting in storage.
     *
     * @param CreateScalaEvaluationSettingRequest $request
     *
     * @return Response
     */
    public function store(CreateScalaEvaluationSettingRequest $request)
    {
        $input = $request->all();

        $scalaEvaluationSetting = $this->scalaEvaluationSettingRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/scalaEvaluationSettings.singular')]));

        return redirect(route('scalaEvaluationSettings.index'));
    }

    /**
     * Display the specified ScalaEvaluationSetting.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $scalaEvaluationSetting = $this->scalaEvaluationSettingRepository->find($id);

        if (empty($scalaEvaluationSetting)) {
            Flash::error(__('messages.not_found', ['model' => __('models/scalaEvaluationSettings.singular')]));

            return redirect(route('scalaEvaluationSettings.index'));
        }

        return view('teacher.scala_evaluation_settings.show')->with('scalaEvaluationSetting', $scalaEvaluationSetting);
    }

    /**
     * Show the form for editing the specified ScalaEvaluationSetting.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $scalaEvaluationSetting = $this->scalaEvaluationSettingRepository->find($id);

        if (empty($scalaEvaluationSetting)) {
            Flash::error(__('messages.not_found', ['model' => __('models/scalaEvaluationSettings.singular')]));

            return redirect(route('scalaEvaluationSettings.index'));
        }

        return view('teacher.scala_evaluation_settings.edit')->with('scalaEvaluationSetting', $scalaEvaluationSetting);
    }

    /**
     * Update the specified ScalaEvaluationSetting in storage.
     *
     * @param  int              $id
     * @param UpdateScalaEvaluationSettingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateScalaEvaluationSettingRequest $request)
    {
        $scalaEvaluationSetting = $this->scalaEvaluationSettingRepository->find($id);

        if (empty($scalaEvaluationSetting)) {
            Flash::error(__('messages.not_found', ['model' => __('models/scalaEvaluationSettings.singular')]));

            return redirect(route('scalaEvaluationSettings.index'));
        }

        $scalaEvaluationSetting = $this->scalaEvaluationSettingRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/scalaEvaluationSettings.singular')]));

        return redirect(route('scalaEvaluationSettings.index'));
    }

    /**
     * Remove the specified ScalaEvaluationSetting from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $scalaEvaluationSetting = $this->scalaEvaluationSettingRepository->find($id);

        if (empty($scalaEvaluationSetting)) {
            Flash::error(__('messages.not_found', ['model' => __('models/scalaEvaluationSettings.singular')]));

            return redirect(route('scalaEvaluationSettings.index'));
        }

        $this->scalaEvaluationSettingRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/scalaEvaluationSettings.singular')]));

        return redirect(route('scalaEvaluationSettings.index'));
    }
}
