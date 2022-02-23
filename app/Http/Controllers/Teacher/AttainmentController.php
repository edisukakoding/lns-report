<?php

namespace App\Http\Controllers\Teacher;

use App\DataTables\AttainmentDataTable;
use App\DataTables\AttainmentDetailDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateAttainmentRequest;
use App\Http\Requests\UpdateAttainmentRequest;
use App\Repositories\AttainmentRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use function __;
use function redirect;
use function view;

class AttainmentController extends AppBaseController
{
    /** @var  AttainmentRepository */
    private AttainmentRepository $attainmentRepository;

    public function __construct(AttainmentRepository $attainmentRepo)
    {
        $this->attainmentRepository = $attainmentRepo;
    }

    /**
     * Display a listing of the Attainment.
     *
     * @param AttainmentDataTable $attainmentDataTable
     * @return mixed
     */
    public function index(AttainmentDataTable $attainmentDataTable): mixed
    {
        return $attainmentDataTable->render('teacher.attainments.index');
    }

    /**
     * Show the form for creating a new Attainment.
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        return view('teacher.attainments.create');
    }

    /**
     * Store a newly created Attainment in storage.
     *
     * @param CreateAttainmentRequest $request
     * @return Redirector|Application|RedirectResponse
     */
    public function store(CreateAttainmentRequest $request): Redirector|Application|RedirectResponse
    {
        $input = $request->all();
        $input['user_id'] = Auth::id();
        $this->attainmentRepository->create($input);

        flash(__('messages.saved', ['model' => __('models/attainments.singular')]), 'success');

        return redirect(route('attainments.index'));
    }

    /**
     * Display the specified Attainment.
     *
     * @param int $id
     * @param AttainmentDetailDataTable $attainmentDetailDataTable
     * @return Application|RedirectResponse|Redirector|mixed
     */

    public function show(int $id, AttainmentDetailDataTable $attainmentDetailDataTable): mixed
    {
        $attainment = $this->attainmentRepository->find($id);

        if (empty($attainment)) {
            flash(__('messages.not_found', ['model' => __('models/attainments.singular')]), 'error');

            return redirect(route('attainments.index'));
        }

        return $attainmentDetailDataTable->render('teacher.attainments.show', compact('attainment'));
    }

    /**
     * Show the form for editing the specified Attainment.
     *
     * @param int $id
     * @return View|Factory|Redirector|Application|RedirectResponse
     */
    public function edit(int $id): View|Factory|Redirector|Application|RedirectResponse
    {
        $attainment = $this->attainmentRepository->find($id);

        if (empty($attainment)) {
            flash(__('messages.not_found', ['model' => __('models/attainments.singular')]), 'error');

            return redirect(route('attainments.index'));
        }

        return view('teacher.attainments.edit')->with('attainment', $attainment);
    }

    /**
     * Update the specified Attainment in storage.
     *
     * @param int $id
     * @param UpdateAttainmentRequest $request
     * @return Redirector|Application|RedirectResponse
     */
    public function update(int $id, UpdateAttainmentRequest $request): Redirector|Application|RedirectResponse
    {
        $attainment = $this->attainmentRepository->find($id);

        if (empty($attainment)) {
            flash(__('messages.not_found', ['model' => __('models/attainments.singular')]), 'error');

            return redirect(route('attainments.index'));
        }

        $this->attainmentRepository->update($request->all(), $id);

        flash(__('messages.updated', ['model' => __('models/attainments.singular')]), 'success');

        return redirect(route('attainments.index'));
    }

    /**
     * Remove the specified Attainment from storage.
     *
     * @param int $id
     * @return Redirector|Application|RedirectResponse
     * @throws Exception
     */
    public function destroy(int $id): Redirector|Application|RedirectResponse
    {
        $attainment = $this->attainmentRepository->find($id);

        if (empty($attainment)) {
            flash(__('messages.not_found', ['model' => __('models/attainments.singular')]), 'error');

            return redirect(route('attainments.index'));
        }

        $this->attainmentRepository->delete($id);

        flash(__('messages.deleted', ['model' => __('models/attainments.singular')]), 'success');

        return redirect(route('attainments.index'));
    }
}
