<?php

namespace App\Http\Controllers;

use App\DataTables\PeriodSettingDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePeriodSettingRequest;
use App\Http\Requests\UpdatePeriodSettingRequest;
use App\Repositories\PeriodSettingRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PeriodSettingController extends AppBaseController
{
    /** @var  PeriodSettingRepository */
    private $periodSettingRepository;

    public function __construct(PeriodSettingRepository $periodSettingRepo)
    {
        $this->periodSettingRepository = $periodSettingRepo;
    }

    /**
     * Display a listing of the PeriodSetting.
     *
     * @param PeriodSettingDataTable $periodSettingDataTable
     * @return Response
     */
    public function index(PeriodSettingDataTable $periodSettingDataTable)
    {
        return $periodSettingDataTable->render('period_settings.index');
    }

    /**
     * Show the form for creating a new PeriodSetting.
     *
     * @return Response
     */
    public function create()
    {
        return view('period_settings.create');
    }

    /**
     * Store a newly created PeriodSetting in storage.
     *
     * @param CreatePeriodSettingRequest $request
     *
     * @return Response
     */
    public function store(CreatePeriodSettingRequest $request)
    {
        $input = $request->all();

        $periodSetting = $this->periodSettingRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/periodSettings.singular')]));

        return redirect(route('periodSettings.index'));
    }

    /**
     * Display the specified PeriodSetting.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $periodSetting = $this->periodSettingRepository->find($id);

        if (empty($periodSetting)) {
            Flash::error(__('messages.not_found', ['model' => __('models/periodSettings.singular')]));

            return redirect(route('periodSettings.index'));
        }

        return view('period_settings.show')->with('periodSetting', $periodSetting);
    }

    /**
     * Show the form for editing the specified PeriodSetting.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $periodSetting = $this->periodSettingRepository->find($id);

        if (empty($periodSetting)) {
            Flash::error(__('messages.not_found', ['model' => __('models/periodSettings.singular')]));

            return redirect(route('periodSettings.index'));
        }

        return view('period_settings.edit')->with('periodSetting', $periodSetting);
    }

    /**
     * Update the specified PeriodSetting in storage.
     *
     * @param  int              $id
     * @param UpdatePeriodSettingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePeriodSettingRequest $request)
    {
        $periodSetting = $this->periodSettingRepository->find($id);

        if (empty($periodSetting)) {
            Flash::error(__('messages.not_found', ['model' => __('models/periodSettings.singular')]));

            return redirect(route('periodSettings.index'));
        }

        $periodSetting = $this->periodSettingRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/periodSettings.singular')]));

        return redirect(route('periodSettings.index'));
    }

    /**
     * Remove the specified PeriodSetting from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $periodSetting = $this->periodSettingRepository->find($id);

        if (empty($periodSetting)) {
            Flash::error(__('messages.not_found', ['model' => __('models/periodSettings.singular')]));

            return redirect(route('periodSettings.index'));
        }

        $this->periodSettingRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/periodSettings.singular')]));

        return redirect(route('periodSettings.index'));
    }
}
