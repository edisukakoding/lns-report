<?php

namespace App\Http\Controllers;

use App\DataTables\ClassRoomDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateClassRoomRequest;
use App\Http\Requests\UpdateClassRoomRequest;
use App\Repositories\ClassRoomRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ClassRoomController extends AppBaseController
{
    /** @var  ClassRoomRepository */
    private $classRoomRepository;

    public function __construct(ClassRoomRepository $classRoomRepo)
    {
        $this->classRoomRepository = $classRoomRepo;
    }

    /**
     * Display a listing of the ClassRoom.
     *
     * @param ClassRoomDataTable $classRoomDataTable
     * @return Response
     */
    public function index(ClassRoomDataTable $classRoomDataTable)
    {
        return $classRoomDataTable->render('class_rooms.index');
    }

    /**
     * Show the form for creating a new ClassRoom.
     *
     * @return Response
     */
    public function create()
    {
        return view('class_rooms.create');
    }

    /**
     * Store a newly created ClassRoom in storage.
     *
     * @param CreateClassRoomRequest $request
     *
     * @return Response
     */
    public function store(CreateClassRoomRequest $request)
    {
        $input = $request->all();

        $classRoom = $this->classRoomRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/classRooms.singular')]));

        return redirect(route('classRooms.index'));
    }

    /**
     * Display the specified ClassRoom.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $classRoom = $this->classRoomRepository->find($id);

        if (empty($classRoom)) {
            Flash::error(__('messages.not_found', ['model' => __('models/classRooms.singular')]));

            return redirect(route('classRooms.index'));
        }

        return view('class_rooms.show')->with('classRoom', $classRoom);
    }

    /**
     * Show the form for editing the specified ClassRoom.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $classRoom = $this->classRoomRepository->find($id);

        if (empty($classRoom)) {
            Flash::error(__('messages.not_found', ['model' => __('models/classRooms.singular')]));

            return redirect(route('classRooms.index'));
        }

        return view('class_rooms.edit')->with('classRoom', $classRoom);
    }

    /**
     * Update the specified ClassRoom in storage.
     *
     * @param  int              $id
     * @param UpdateClassRoomRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClassRoomRequest $request)
    {
        $classRoom = $this->classRoomRepository->find($id);

        if (empty($classRoom)) {
            Flash::error(__('messages.not_found', ['model' => __('models/classRooms.singular')]));

            return redirect(route('classRooms.index'));
        }

        $classRoom = $this->classRoomRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/classRooms.singular')]));

        return redirect(route('classRooms.index'));
    }

    /**
     * Remove the specified ClassRoom from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $classRoom = $this->classRoomRepository->find($id);

        if (empty($classRoom)) {
            Flash::error(__('messages.not_found', ['model' => __('models/classRooms.singular')]));

            return redirect(route('classRooms.index'));
        }

        $this->classRoomRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/classRooms.singular')]));

        return redirect(route('classRooms.index'));
    }
}
