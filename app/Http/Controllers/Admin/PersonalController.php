<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PersonalDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreatePersonalRequest;
use App\Http\Requests\UpdatePersonalRequest;
use App\Repositories\PersonalRepository;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Response;
use function __;
use function redirect;
use function view;

class PersonalController extends AppBaseController
{
    /** @var  PersonalRepository */
    private $personalRepository;

    public function __construct(PersonalRepository $personalRepo)
    {
        $this->personalRepository = $personalRepo;
    }

    /**
     * Display a listing of the Personal.
     *
     * @param PersonalDataTable $personalDataTable
     * @return Response
     */
    public function index(PersonalDataTable $personalDataTable)
    {
        return $personalDataTable->render('admin.personals.index');
    }

    /**
     * Show the form for creating a new Personal.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.personals.create');
    }

    /**
     * Store a newly created Personal in storage.
     *
     * @param CreatePersonalRequest $request
     *
     * @return Response
     */
    public function store(CreatePersonalRequest $request)
    {
        $input = $request->all();

        $personal = $this->personalRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/personals.singular')]));

        return redirect(route('personals.index'));
    }

    /**
     * Display the specified Personal.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $personal = $this->personalRepository->find($id);

        if (empty($personal)) {
            Flash::error(__('messages.not_found', ['model' => __('models/personals.singular')]));

            return redirect(route('admin.personals.index'));
        }

        return view('admin.personals.show')->with('personal', $personal);
    }

    /**
     * Show the form for editing the specified Personal.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $personal = $this->personalRepository->find($id);

        if (empty($personal)) {
            Flash::error(__('messages.not_found', ['model' => __('models/personals.singular')]));

            return redirect(route('personals.index'));
        }

        return view('admin.personals.edit')->with('admin.personal', $personal);
    }

    /**
     * Update the specified Personal in storage.
     *
     * @param  int              $id
     * @param UpdatePersonalRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePersonalRequest $request)
    {
        $personal = $this->personalRepository->find($id);

        if (empty($personal)) {
            Flash::error(__('messages.not_found', ['model' => __('models/personals.singular')]));

            return redirect(route('personals.index'));
        }

        $personal = $this->personalRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/personals.singular')]));

        return redirect(route('personals.index'));
    }

    /**
     * Remove the specified Personal from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $personal = $this->personalRepository->find($id);

        if (empty($personal)) {
            Flash::error(__('messages.not_found', ['model' => __('models/personals.singular')]));

            return redirect(route('personals.index'));
        }

        $this->personalRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/personals.singular')]));

        return redirect(route('personals.index'));
    }
}
