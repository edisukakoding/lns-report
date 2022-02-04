<?php

namespace App\Http\Controllers;

use App\DataTables\RaportDetailDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateRaportDetailRequest;
use App\Http\Requests\UpdateRaportDetailRequest;
use App\Repositories\RaportDetailRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class RaportDetailController extends AppBaseController
{
    /** @var  RaportDetailRepository */
    private $raportDetailRepository;

    public function __construct(RaportDetailRepository $raportDetailRepo)
    {
        $this->raportDetailRepository = $raportDetailRepo;
    }

    /**
     * Display a listing of the RaportDetail.
     *
     * @param RaportDetailDataTable $raportDetailDataTable
     * @return Response
     */
    public function index(RaportDetailDataTable $raportDetailDataTable)
    {
        return $raportDetailDataTable->render('raport_details.index');
    }

    /**
     * Show the form for creating a new RaportDetail.
     *
     * @return Response
     */
    public function create()
    {
        return view('raport_details.create');
    }

    /**
     * Store a newly created RaportDetail in storage.
     *
     * @param CreateRaportDetailRequest $request
     *
     * @return Response
     */
    public function store(CreateRaportDetailRequest $request)
    {
        $input = $request->all();

        $raportDetail = $this->raportDetailRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/raportDetails.singular')]));

        return redirect(route('raportDetails.index'));
    }

    /**
     * Display the specified RaportDetail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $raportDetail = $this->raportDetailRepository->find($id);

        if (empty($raportDetail)) {
            Flash::error(__('messages.not_found', ['model' => __('models/raportDetails.singular')]));

            return redirect(route('raportDetails.index'));
        }

        return view('raport_details.show')->with('raportDetail', $raportDetail);
    }

    /**
     * Show the form for editing the specified RaportDetail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $raportDetail = $this->raportDetailRepository->find($id);

        if (empty($raportDetail)) {
            Flash::error(__('messages.not_found', ['model' => __('models/raportDetails.singular')]));

            return redirect(route('raportDetails.index'));
        }

        return view('raport_details.edit')->with('raportDetail', $raportDetail);
    }

    /**
     * Update the specified RaportDetail in storage.
     *
     * @param  int              $id
     * @param UpdateRaportDetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRaportDetailRequest $request)
    {
        $raportDetail = $this->raportDetailRepository->find($id);

        if (empty($raportDetail)) {
            Flash::error(__('messages.not_found', ['model' => __('models/raportDetails.singular')]));

            return redirect(route('raportDetails.index'));
        }

        $raportDetail = $this->raportDetailRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/raportDetails.singular')]));

        return redirect(route('raportDetails.index'));
    }

    /**
     * Remove the specified RaportDetail from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $raportDetail = $this->raportDetailRepository->find($id);

        if (empty($raportDetail)) {
            Flash::error(__('messages.not_found', ['model' => __('models/raportDetails.singular')]));

            return redirect(route('raportDetails.index'));
        }

        $this->raportDetailRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/raportDetails.singular')]));

        return redirect(route('raportDetails.index'));
    }
}
