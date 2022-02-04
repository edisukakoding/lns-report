<?php

namespace App\Http\Controllers;

use App\DataTables\AttainmentDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAttainmentRequest;
use App\Http\Requests\UpdateAttainmentRequest;
use App\Repositories\AttainmentRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AttainmentController extends AppBaseController
{
    /** @var  AttainmentRepository */
    private $attainmentRepository;

    public function __construct(AttainmentRepository $attainmentRepo)
    {
        $this->attainmentRepository = $attainmentRepo;
    }

    /**
     * Display a listing of the Attainment.
     *
     * @param AttainmentDataTable $attainmentDataTable
     * @return Response
     */
    public function index(AttainmentDataTable $attainmentDataTable)
    {
        return $attainmentDataTable->render('attainments.index');
    }

    /**
     * Show the form for creating a new Attainment.
     *
     * @return Response
     */
    public function create()
    {
        return view('attainments.create');
    }

    /**
     * Store a newly created Attainment in storage.
     *
     * @param CreateAttainmentRequest $request
     *
     * @return Response
     */
    public function store(CreateAttainmentRequest $request)
    {
        $input = $request->all();

        $attainment = $this->attainmentRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/attainments.singular')]));

        return redirect(route('attainments.index'));
    }

    /**
     * Display the specified Attainment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $attainment = $this->attainmentRepository->find($id);

        if (empty($attainment)) {
            Flash::error(__('messages.not_found', ['model' => __('models/attainments.singular')]));

            return redirect(route('attainments.index'));
        }

        return view('attainments.show')->with('attainment', $attainment);
    }

    /**
     * Show the form for editing the specified Attainment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $attainment = $this->attainmentRepository->find($id);

        if (empty($attainment)) {
            Flash::error(__('messages.not_found', ['model' => __('models/attainments.singular')]));

            return redirect(route('attainments.index'));
        }

        return view('attainments.edit')->with('attainment', $attainment);
    }

    /**
     * Update the specified Attainment in storage.
     *
     * @param  int              $id
     * @param UpdateAttainmentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAttainmentRequest $request)
    {
        $attainment = $this->attainmentRepository->find($id);

        if (empty($attainment)) {
            Flash::error(__('messages.not_found', ['model' => __('models/attainments.singular')]));

            return redirect(route('attainments.index'));
        }

        $attainment = $this->attainmentRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/attainments.singular')]));

        return redirect(route('attainments.index'));
    }

    /**
     * Remove the specified Attainment from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $attainment = $this->attainmentRepository->find($id);

        if (empty($attainment)) {
            Flash::error(__('messages.not_found', ['model' => __('models/attainments.singular')]));

            return redirect(route('attainments.index'));
        }

        $this->attainmentRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/attainments.singular')]));

        return redirect(route('attainments.index'));
    }
}
