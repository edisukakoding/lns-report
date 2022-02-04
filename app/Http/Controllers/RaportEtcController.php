<?php

namespace App\Http\Controllers;

use App\DataTables\RaportEtcDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateRaportEtcRequest;
use App\Http\Requests\UpdateRaportEtcRequest;
use App\Repositories\RaportEtcRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class RaportEtcController extends AppBaseController
{
    /** @var  RaportEtcRepository */
    private $raportEtcRepository;

    public function __construct(RaportEtcRepository $raportEtcRepo)
    {
        $this->raportEtcRepository = $raportEtcRepo;
    }

    /**
     * Display a listing of the RaportEtc.
     *
     * @param RaportEtcDataTable $raportEtcDataTable
     * @return Response
     */
    public function index(RaportEtcDataTable $raportEtcDataTable)
    {
        return $raportEtcDataTable->render('raport_etcs.index');
    }

    /**
     * Show the form for creating a new RaportEtc.
     *
     * @return Response
     */
    public function create()
    {
        return view('raport_etcs.create');
    }

    /**
     * Store a newly created RaportEtc in storage.
     *
     * @param CreateRaportEtcRequest $request
     *
     * @return Response
     */
    public function store(CreateRaportEtcRequest $request)
    {
        $input = $request->all();

        $raportEtc = $this->raportEtcRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/raportEtcs.singular')]));

        return redirect(route('raportEtcs.index'));
    }

    /**
     * Display the specified RaportEtc.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $raportEtc = $this->raportEtcRepository->find($id);

        if (empty($raportEtc)) {
            Flash::error(__('messages.not_found', ['model' => __('models/raportEtcs.singular')]));

            return redirect(route('raportEtcs.index'));
        }

        return view('raport_etcs.show')->with('raportEtc', $raportEtc);
    }

    /**
     * Show the form for editing the specified RaportEtc.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $raportEtc = $this->raportEtcRepository->find($id);

        if (empty($raportEtc)) {
            Flash::error(__('messages.not_found', ['model' => __('models/raportEtcs.singular')]));

            return redirect(route('raportEtcs.index'));
        }

        return view('raport_etcs.edit')->with('raportEtc', $raportEtc);
    }

    /**
     * Update the specified RaportEtc in storage.
     *
     * @param  int              $id
     * @param UpdateRaportEtcRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRaportEtcRequest $request)
    {
        $raportEtc = $this->raportEtcRepository->find($id);

        if (empty($raportEtc)) {
            Flash::error(__('messages.not_found', ['model' => __('models/raportEtcs.singular')]));

            return redirect(route('raportEtcs.index'));
        }

        $raportEtc = $this->raportEtcRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/raportEtcs.singular')]));

        return redirect(route('raportEtcs.index'));
    }

    /**
     * Remove the specified RaportEtc from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $raportEtc = $this->raportEtcRepository->find($id);

        if (empty($raportEtc)) {
            Flash::error(__('messages.not_found', ['model' => __('models/raportEtcs.singular')]));

            return redirect(route('raportEtcs.index'));
        }

        $this->raportEtcRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/raportEtcs.singular')]));

        return redirect(route('raportEtcs.index'));
    }
}
