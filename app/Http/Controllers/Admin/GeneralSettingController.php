<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\GeneralSettingDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateGeneralSettingRequest;
use App\Http\Requests\UpdateGeneralSettingRequest;
use App\Repositories\GeneralSettingRepository;
use Flash;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Response;

class GeneralSettingController extends AppBaseController
{
    /** @var  GeneralSettingRepository */
    private GeneralSettingRepository $generalSettingRepository;

    public function __construct(GeneralSettingRepository $generalSettingRepo)
    {
        $this->generalSettingRepository = $generalSettingRepo;
    }

    /**
     * Display a listing of the GeneralSetting.
     *
     * @param GeneralSettingDataTable $generalSettingDataTable
     * @return mixed
     */
    public function index(GeneralSettingDataTable $generalSettingDataTable): mixed
    {
        return $generalSettingDataTable->render('general_settings.index');
    }

    /**
     * Show the form for creating a new GeneralSetting.
     *
     * @return Response
     */
    public function create()
    {
        return view('general_settings.create');
    }

    /**
     * Store a newly created GeneralSetting in storage.
     *
     * @param CreateGeneralSettingRequest $request
     *
     * @return Response
     */
    public function store(CreateGeneralSettingRequest $request)
    {
        $input = $request->all();

        $generalSetting = $this->generalSettingRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/generalSettings.singular')]));

        return redirect(route('generalSettings.index'));
    }

    /**
     * Display the specified GeneralSetting.
     *
     * @return View|Factory|Redirector|Application|RedirectResponse
     */
    public function show(): View|Factory|Redirector|Application|RedirectResponse
    {
        $generalSetting = $this->generalSettingRepository->find(1);
        if (empty($generalSetting)) {
            flash(__('messages.not_found', ['model' => __('models/generalSettings.singular')]), 'error');

            return redirect()->back();
        }

        return view('admin.general_settings.show')->with('generalSetting', $generalSetting);
    }

    /**
     * Show the form for editing the specified GeneralSetting.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $generalSetting = $this->generalSettingRepository->find($id);

        if (empty($generalSetting)) {
            Flash::error(__('messages.not_found', ['model' => __('models/generalSettings.singular')]));

            return redirect(route('generalSettings.index'));
        }

        return view('general_settings.edit')->with('generalSetting', $generalSetting);
    }

    /**
     * Update the specified GeneralSetting in storage.
     * @param Request $request
     * @return Model|Collection|Builder|array
     */

    public function update(Request $request): Model|Collection|Builder|array
    {
        return $this->generalSettingRepository->update($request->all(), $request->id);
    }

    /**
     * Remove the specified GeneralSetting from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $generalSetting = $this->generalSettingRepository->find($id);

        if (empty($generalSetting)) {
            Flash::error(__('messages.not_found', ['model' => __('models/generalSettings.singular')]));

            return redirect(route('generalSettings.index'));
        }

        $this->generalSettingRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/generalSettings.singular')]));

        return redirect(route('generalSettings.index'));
    }
}
