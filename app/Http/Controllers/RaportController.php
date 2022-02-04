<?php

namespace App\Http\Controllers;

use App\DataTables\RaportDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateRaportRequest;
use App\Http\Requests\UpdateRaportRequest;
use App\Repositories\RaportRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class RaportController extends AppBaseController
{
    /** @var  RaportRepository */
    private $raportRepository;

    public function __construct(RaportRepository $raportRepo)
    {
        $this->raportRepository = $raportRepo;
    }

    /**
     * Display a listing of the Raport.
     *
     * @param RaportDataTable $raportDataTable
     * @return Response
     */
    public function index(RaportDataTable $raportDataTable)
    {
        return $raportDataTable->render('raports.index');
    }

    /**
     * Show the form for creating a new Raport.
     *
     * @return Response
     */
    public function create()
    {
        return view('raports.create');
    }

    /**
     * Store a newly created Raport in storage.
     *
     * @param CreateRaportRequest $request
     *
     * @return Response
     */
    public function store(CreateRaportRequest $request)
    {
        $input = $request->all();

        $raport = $this->raportRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/raports.singular')]));

        return redirect(route('raports.index'));
    }

    /**
     * Display the specified Raport.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $raport = $this->raportRepository->find($id);

        if (empty($raport)) {
            Flash::error(__('messages.not_found', ['model' => __('models/raports.singular')]));

            return redirect(route('raports.index'));
        }

        return view('raports.show')->with('raport', $raport);
    }

    /**
     * Show the form for editing the specified Raport.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $raport = $this->raportRepository->find($id);

        if (empty($raport)) {
            Flash::error(__('messages.not_found', ['model' => __('models/raports.singular')]));

            return redirect(route('raports.index'));
        }

        return view('raports.edit')->with('raport', $raport);
    }

    /**
     * Update the specified Raport in storage.
     *
     * @param  int              $id
     * @param UpdateRaportRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRaportRequest $request)
    {
        $raport = $this->raportRepository->find($id);

        if (empty($raport)) {
            Flash::error(__('messages.not_found', ['model' => __('models/raports.singular')]));

            return redirect(route('raports.index'));
        }

        $raport = $this->raportRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/raports.singular')]));

        return redirect(route('raports.index'));
    }

    /**
     * Remove the specified Raport from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $raport = $this->raportRepository->find($id);

        if (empty($raport)) {
            Flash::error(__('messages.not_found', ['model' => __('models/raports.singular')]));

            return redirect(route('raports.index'));
        }

        $this->raportRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/raports.singular')]));

        return redirect(route('raports.index'));
    }
}
