<?php

namespace App\Http\Controllers\Teacher;

use App\DataTables\AspectSettingDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateAspectSettingRequest;
use App\Http\Requests\UpdateAspectSettingRequest;
use App\Repositories\AspectSettingRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use function __;
use function redirect;
use function view;

class AspectSettingController extends AppBaseController
{
    /** @var  AspectSettingRepository */
    private AspectSettingRepository $aspectSettingRepository;

    public function __construct(AspectSettingRepository $aspectSettingRepo)
    {
        $this->aspectSettingRepository = $aspectSettingRepo;
    }

    /**
     * Display a listing of the AspectSetting.
     *
     * @param AspectSettingDataTable $aspectSettingDataTable
     * @return mixed
     */
    public function index(AspectSettingDataTable $aspectSettingDataTable): mixed
    {
        return $aspectSettingDataTable->render('teacher.aspect_settings.index');
    }

    /**
     * Show the form for creating a new AspectSetting.
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        return view('teacher.aspect_settings.create');
    }

    /**
     * Store a newly created AspectSetting in storage.
     *
     * @param CreateAspectSettingRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CreateAspectSettingRequest $request): Redirector|RedirectResponse|Application
    {
        $input = $request->all();

        $this->aspectSettingRepository->create($input);

        flash(__('messages.saved', ['model' => __('models/aspectSettings.singular')]), 'success');

        return redirect(route('aspectSettings.index'));
    }

    /**
     * Display the specified AspectSetting.
     *
     * @param int $id
     * @return View|Factory|Redirector|Application|RedirectResponse
     */
    public function show(int $id): View|Factory|Redirector|Application|RedirectResponse
    {
        $aspectSetting = $this->aspectSettingRepository->find($id);

        if (empty($aspectSetting)) {
            flash(__('messages.not_found', ['model' => __('models/aspectSettings.singular')]), 'error');

            return redirect(route('aspectSettings.index'));
        }

        return view('teacher.aspect_settings.show')->with('aspectSetting', $aspectSetting);
    }

    /**
     * Show the form for editing the specified AspectSetting.
     *
     * @param int $id
     * @return View|Factory|Redirector|Application|RedirectResponse
     */
    public function edit(int $id): View|Factory|Redirector|Application|RedirectResponse
    {
        $aspectSetting = $this->aspectSettingRepository->find($id);

        if (empty($aspectSetting)) {
            flash(__('messages.not_found', ['model' => __('models/aspectSettings.singular')]), 'error');

            return redirect(route('aspectSettings.index'));
        }

        return view('teacher.aspect_settings.edit')->with('aspectSetting', $aspectSetting);
    }

    /**
     * Update the specified AspectSetting in storage.
     *
     * @param int $id
     * @param UpdateAspectSettingRequest $request
     * @return Redirector|Application|RedirectResponse
     */
    public function update(int $id, UpdateAspectSettingRequest $request): Redirector|Application|RedirectResponse
    {
        $aspectSetting = $this->aspectSettingRepository->find($id);

        if (empty($aspectSetting)) {
            flash(__('messages.not_found', ['model' => __('models/aspectSettings.singular')]), 'error');

            return redirect(route('aspectSettings.index'));
        }

        $this->aspectSettingRepository->update($request->all(), $id);

        flash(__('messages.updated', ['model' => __('models/aspectSettings.singular')]), 'success');

        return redirect(route('aspectSettings.index'));
    }

    /**
     * Remove the specified AspectSetting from storage.
     *
     * @param int $id
     *
     * @return Redirector|Application|RedirectResponse
     * @throws Exception
     */
    public function destroy(int $id): Redirector|Application|RedirectResponse
    {
        $aspectSetting = $this->aspectSettingRepository->find($id);

        if (empty($aspectSetting)) {
            flash(__('messages.not_found', ['model' => __('models/aspectSettings.singular')]), 'error');

            return redirect(route('aspectSettings.index'));
        }

        $this->aspectSettingRepository->delete($id);

        flash(__('messages.deleted', ['model' => __('models/aspectSettings.singular')]), 'success');

        return redirect(route('aspectSettings.index'));
    }
}
