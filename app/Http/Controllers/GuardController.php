<?php

namespace App\Http\Controllers;

use App\DataTables\GuardDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateGuardRequest;
use App\Http\Requests\UpdateGuardRequest;
use App\Repositories\GuardRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class GuardController extends AppBaseController
{
    /** @var  GuardRepository */
    private $guardRepository;

    public function __construct(GuardRepository $guardRepo)
    {
        $this->guardRepository = $guardRepo;
    }

    /**
     * Display a listing of the Guard.
     *
     * @param GuardDataTable $guardDataTable
     * @return Response
     */
    public function index(GuardDataTable $guardDataTable)
    {
        return $guardDataTable->render('guards.index');
    }

    /**
     * Show the form for creating a new Guard.
     *
     * @return Response
     */
    public function create()
    {
        return view('guards.create');
    }

    /**
     * Store a newly created Guard in storage.
     *
     * @param CreateGuardRequest $request
     *
     * @return Response
     */
    public function store(CreateGuardRequest $request)
    {
        $input = $request->all();

        $guard = $this->guardRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/guards.singular')]));

        return redirect(route('guards.index'));
    }

    /**
     * Display the specified Guard.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $guard = $this->guardRepository->find($id);

        if (empty($guard)) {
            Flash::error(__('messages.not_found', ['model' => __('models/guards.singular')]));

            return redirect(route('guards.index'));
        }

        return view('guards.show')->with('guard', $guard);
    }

    /**
     * Show the form for editing the specified Guard.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $guard = $this->guardRepository->find($id);

        if (empty($guard)) {
            Flash::error(__('messages.not_found', ['model' => __('models/guards.singular')]));

            return redirect(route('guards.index'));
        }

        return view('guards.edit')->with('guard', $guard);
    }

    /**
     * Update the specified Guard in storage.
     *
     * @param  int              $id
     * @param UpdateGuardRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGuardRequest $request)
    {
        $guard = $this->guardRepository->find($id);

        if (empty($guard)) {
            Flash::error(__('messages.not_found', ['model' => __('models/guards.singular')]));

            return redirect(route('guards.index'));
        }

        $guard = $this->guardRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/guards.singular')]));

        return redirect(route('guards.index'));
    }

    /**
     * Remove the specified Guard from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $guard = $this->guardRepository->find($id);

        if (empty($guard)) {
            Flash::error(__('messages.not_found', ['model' => __('models/guards.singular')]));

            return redirect(route('guards.index'));
        }

        $this->guardRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/guards.singular')]));

        return redirect(route('guards.index'));
    }
}
