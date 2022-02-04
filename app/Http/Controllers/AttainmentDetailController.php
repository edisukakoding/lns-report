<?php

namespace App\Http\Controllers;

use App\DataTables\AttainmentDetailDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAttainmentDetailRequest;
use App\Http\Requests\UpdateAttainmentDetailRequest;
use App\Repositories\AttainmentDetailRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AttainmentDetailController extends AppBaseController
{
    /** @var  AttainmentDetailRepository */
    private $attainmentDetailRepository;

    public function __construct(AttainmentDetailRepository $attainmentDetailRepo)
    {
        $this->attainmentDetailRepository = $attainmentDetailRepo;
    }

    /**
     * Display a listing of the AttainmentDetail.
     *
     * @param AttainmentDetailDataTable $attainmentDetailDataTable
     * @return Response
     */
    public function index(AttainmentDetailDataTable $attainmentDetailDataTable)
    {
        return $attainmentDetailDataTable->render('attainment_details.index');
    }

    /**
     * Show the form for creating a new AttainmentDetail.
     *
     * @return Response
     */
    public function create()
    {
        return view('attainment_details.create');
    }

    /**
     * Store a newly created AttainmentDetail in storage.
     *
     * @param CreateAttainmentDetailRequest $request
     *
     * @return Response
     */
    public function store(CreateAttainmentDetailRequest $request)
    {
        $input = $request->all();

        $attainmentDetail = $this->attainmentDetailRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/attainmentDetails.singular')]));

        return redirect(route('attainmentDetails.index'));
    }

    /**
     * Display the specified AttainmentDetail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $attainmentDetail = $this->attainmentDetailRepository->find($id);

        if (empty($attainmentDetail)) {
            Flash::error(__('messages.not_found', ['model' => __('models/attainmentDetails.singular')]));

            return redirect(route('attainmentDetails.index'));
        }

        return view('attainment_details.show')->with('attainmentDetail', $attainmentDetail);
    }

    /**
     * Show the form for editing the specified AttainmentDetail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $attainmentDetail = $this->attainmentDetailRepository->find($id);

        if (empty($attainmentDetail)) {
            Flash::error(__('messages.not_found', ['model' => __('models/attainmentDetails.singular')]));

            return redirect(route('attainmentDetails.index'));
        }

        return view('attainment_details.edit')->with('attainmentDetail', $attainmentDetail);
    }

    /**
     * Update the specified AttainmentDetail in storage.
     *
     * @param  int              $id
     * @param UpdateAttainmentDetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAttainmentDetailRequest $request)
    {
        $attainmentDetail = $this->attainmentDetailRepository->find($id);

        if (empty($attainmentDetail)) {
            Flash::error(__('messages.not_found', ['model' => __('models/attainmentDetails.singular')]));

            return redirect(route('attainmentDetails.index'));
        }

        $attainmentDetail = $this->attainmentDetailRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/attainmentDetails.singular')]));

        return redirect(route('attainmentDetails.index'));
    }

    /**
     * Remove the specified AttainmentDetail from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $attainmentDetail = $this->attainmentDetailRepository->find($id);

        if (empty($attainmentDetail)) {
            Flash::error(__('messages.not_found', ['model' => __('models/attainmentDetails.singular')]));

            return redirect(route('attainmentDetails.index'));
        }

        $this->attainmentDetailRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/attainmentDetails.singular')]));

        return redirect(route('attainmentDetails.index'));
    }
}
