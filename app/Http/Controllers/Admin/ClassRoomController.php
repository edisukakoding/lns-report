<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ClassRoomDataTable;
use App\Http\Requests\CreateClassRoomRequest;
use App\Http\Requests\UpdateClassRoomRequest;
use App\Repositories\ClassRoomRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\AppBaseController;
use function flash;

class ClassRoomController extends AppBaseController
{
    /** @var  ClassRoomRepository */
    private ClassRoomRepository $classRoomRepository;

    public function __construct(ClassRoomRepository $classRoomRepo)
    {
        $this->classRoomRepository = $classRoomRepo;
    }

    /**
     * Display a listing of the ClassRoom.
     *
     * @param ClassRoomDataTable $classRoomDataTable
     * @return mixed
     */
    public function index(ClassRoomDataTable $classRoomDataTable): mixed
    {
        return $classRoomDataTable->render('admin.class_rooms.index');
    }

    /**
     * Show the form for creating a new ClassRoom.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.class_rooms.create');
    }

    /**
     * Store a newly created ClassRoom in storage.
     *
     * @param CreateClassRoomRequest $request
     *
     * @return RedirectResponse
     */
    public function store(CreateClassRoomRequest $request): RedirectResponse
    {
        $input = $request->all();
        $this->classRoomRepository->create($input);
        flash(__('messages.saved', ['model' => __('models/classRooms.singular')]))->success();
        return redirect(route('classRooms.index'));
    }


    /**
     * Display the specified ClassRoom.
     *
     * @param int $id
     * @return View|Factory|Redirector|Application|RedirectResponse
     */
    public function show(int $id): View|Factory|Redirector|Application|RedirectResponse
    {
        $classRoom = $this->classRoomRepository->find($id);

        if (empty($classRoom)) {
            flash(__('messages.not_found', ['model' => __('models/classRooms.singular')]))->error();

            return redirect(route('classRooms.index'));
        }

        return view('admin.class_rooms.show')->with('classRoom', $classRoom);
    }

    /**
     * Show the form for editing the specified ClassRoom.
     *
     * @param int $id
     *
     * @return Application|Factory|Redirector|RedirectResponse|View
     */
    public function edit(int $id): View|Factory|Redirector|RedirectResponse|Application
    {
        $classRoom = $this->classRoomRepository->find($id);

        if (empty($classRoom)) {
            flash(__('messages.not_found', ['model' => __('models/classRooms.singular')]), 'error');

            return redirect(route('classRooms.index'));
        }
        return view('admin.class_rooms.edit', compact('classRoom'));
    }

    /**
     * Update the specified ClassRoom in storage.
     *
     * @param int $id
     * @param UpdateClassRoomRequest $request
     *
     * @return Application|Redirector|RedirectResponse
     */
    public function update(int $id, UpdateClassRoomRequest $request): Redirector|RedirectResponse|Application
    {
        $classRoom = $this->classRoomRepository->find($id);

        if (empty($classRoom)) {
            flash(__('messages.not_found', ['model' => __('models/classRooms.singular')]), 'error');

            return redirect(route('classRooms.index'));
        }

        $this->classRoomRepository->update($request->all(), $id);

        flash(__('messages.updated', ['model' => __('models/classRooms.singular')]), 'success');

        return redirect(route('classRooms.index'));
    }

    /**
     * Remove the specified ClassRoom from storage.
     *
     * @param int $id
     *
     * @return Application|Redirector|RedirectResponse
     * @throws Exception
     */
    public function destroy(int $id): Redirector|RedirectResponse|Application
    {
        $classRoom = $this->classRoomRepository->find($id);

        if (empty($classRoom)) {
            flash(__('messages.not_found', ['model' => __('models/classRooms.singular')]), 'error');

            return redirect(route('classRooms.index'));
        }

        $this->classRoomRepository->delete($id);

        flash(__('messages.deleted', ['model' => __('models/classRooms.singular')]), 'success');

        return redirect(route('classRooms.index'));
    }
}
