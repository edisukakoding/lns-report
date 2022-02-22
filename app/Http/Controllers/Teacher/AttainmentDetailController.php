<?php

namespace App\Http\Controllers\Teacher;

use App\DataTables\AttainmentDetailDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateAttainmentDetailRequest;
use App\Http\Requests\UpdateAttainmentDetailRequest;
use App\Models\Attainment;
use App\Repositories\AttainmentDetailRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Storage;
use function __;
use function redirect;
use function view;

class AttainmentDetailController extends AppBaseController
{
    /** @var  AttainmentDetailRepository */
    private AttainmentDetailRepository $attainmentDetailRepository;

    public function __construct(AttainmentDetailRepository $attainmentDetailRepo)
    {
        $this->attainmentDetailRepository = $attainmentDetailRepo;
    }

    /**
     * Display a listing of the AttainmentDetail.
     *
     * @param AttainmentDetailDataTable $attainmentDetailDataTable
     * @return mixed
     */
    public function index(AttainmentDetailDataTable $attainmentDetailDataTable): mixed
    {
        return $attainmentDetailDataTable->render('attainment_details.index');
    }

    /**
     * Show the form for creating a new AttainmentDetail.
     * @param Request $request
     * @return Factory|View|Application
     */
    public function create(Request $request): Factory|View|Application
    {
        return view('teacher.attainment_details.create', [
            'attainment' => Attainment::query()->findOrFail($request->input('attainment_id'))
        ]);
    }

    /**
     * Store a newly created AttainmentDetail in storage.
     *
     * @param CreateAttainmentDetailRequest $request
     * @return Redirector|Application|RedirectResponse
     */
    public function store(CreateAttainmentDetailRequest $request): Redirector|Application|RedirectResponse
    {
        $input = $request->all();
        if($request->hasFile('image')) {
            $input['image'] = $request->file('image')->store('public/attainments');
        }
        $this->attainmentDetailRepository->create($input);

        flash(__('messages.saved', ['model' => __('models/attainmentDetails.singular')]), 'success');

        return redirect()->back();
    }

    /**
     * Display the specified AttainmentDetail.
     *
     * @param int $id
     * @return View|Factory|Redirector|Application|RedirectResponse
     */
    public function show(int $id): View|Factory|Redirector|Application|RedirectResponse
    {
        $attainmentDetail = $this->attainmentDetailRepository->find($id);

        if (empty($attainmentDetail)) {
            flash(__('messages.not_found', ['model' => __('models/attainmentDetails.singular')]), 'error');

            return redirect(route('attainmentDetails.index'));
        }

        return view('teacher.attainment_details.show')->with('attainmentDetail', $attainmentDetail);
    }

    /**
     * Show the form for editing the specified AttainmentDetail.
     *
     * @param int $id
     * @return View|Factory|Redirector|Application|RedirectResponse
     */
    public function edit(int $id): View|Factory|Redirector|Application|RedirectResponse
    {
        $attainmentDetail   = $this->attainmentDetailRepository->find($id);
        $attainment         = null;
        if (!empty($attainmentDetail->attainment_id)) {
            $attainment         = Attainment::query()->findOrFail(id: $attainmentDetail->attainment_id);
        }
        if (empty($attainmentDetail)) {
            flash(__('messages.not_found', ['model' => __('models/attainmentDetails.singular')]), 'error');

            return redirect(route('attainmentDetails.index'));
        }

        return view('teacher.attainment_details.edit', compact('attainmentDetail', 'attainment'));
    }

    /**
     * Update the specified AttainmentDetail in storage.
     *
     * @param int $id
     * @param UpdateAttainmentDetailRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function update(int $id, UpdateAttainmentDetailRequest $request): Redirector|RedirectResponse|Application
    {
        $attainmentDetail = $this->attainmentDetailRepository->find($id);

        if (empty($attainmentDetail)) {
            flash(__('messages.not_found', ['model' => __('models/attainmentDetails.singular')]), 'error');

            return redirect(url()->previous());
        }

        $input = $request->all();
        if($request->hasFile('image')) {
            if(isset($attainmentDetail->image)) {
                Storage::delete($attainmentDetail->image);
            }
            $input['image'] = $request->file('image')->store('public/attainments');
        }
        $this->attainmentDetailRepository->update($input, $id);

        flash(__('messages.updated', ['model' => __('models/attainmentDetails.singular')]), 'success');

        return redirect(url()->previous());
    }

    /**
     * Remove the specified AttainmentDetail from storage.
     *
     * @param int $id
     *
     * @return Redirector|Application|RedirectResponse
     * @throws Exception
     */
    public function destroy(int $id): Redirector|Application|RedirectResponse
    {
        $attainmentDetail = $this->attainmentDetailRepository->find($id);

        if (empty($attainmentDetail)) {
            flash(__('messages.not_found', ['model' => __('models/attainmentDetails.singular')]), 'error');

            return redirect(route('attainmentDetails.index'));
        }

        $this->attainmentDetailRepository->delete($id);

        flash(__('messages.deleted', ['model' => __('models/attainmentDetails.singular')]), 'success');

        return redirect(url()->previous());
    }
}
