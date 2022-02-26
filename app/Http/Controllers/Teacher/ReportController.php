<?php

namespace App\Http\Controllers\Teacher;

use App\DataTables\ReportDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Repositories\ReportRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use function __;
use function redirect;
use function view;

class ReportController extends AppBaseController
{
    /** @var  ReportRepository */
    private ReportRepository $reportRepository;

    public function __construct(ReportRepository $reportRepo)
    {
        $this->reportRepository = $reportRepo;
    }

    /**
     * Display a listing of the Raport.
     *
     * @param ReportDataTable $reportDataTable
     * @return mixed
     */
    public function index(ReportDataTable $reportDataTable): mixed
    {
        return $reportDataTable->render('teacher.reports.index');
    }

    /**
     * Show the form for creating a new Raport.
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        return view('teacher.reports.create');
    }

    /**
     * Store a newly created Raport in storage.
     *
     * @param CreateReportRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CreateReportRequest $request): Redirector|RedirectResponse|Application
    {
        $input = $request->all();
        $input['user_id'] = Auth::id();
        $this->reportRepository->create($input);

        flash(__('messages.saved', ['model' => __('models/reports.singular')]), 'success');

        return redirect(route('reports.index'));
    }

    /**
     * Display the specified Raport.
     *
     * @param int $id
     * @return View|Factory|Redirector|Application|RedirectResponse
     */
    public function show(int $id): View|Factory|Redirector|Application|RedirectResponse
    {
        $report = $this->reportRepository->find($id);

        if (empty($report)) {
            flash(__('messages.not_found', ['model' => __('models/reports.singular')]), 'error');

            return redirect(route('reports.index'));
        }

        return view('teacher.reports.show')->with('report', $report);
    }

    /**
     * Show the form for editing the specified Raport.
     *
     * @param int $id
     * @return View|Factory|Redirector|Application|RedirectResponse
     */
    public function edit(int $id): View|Factory|Redirector|Application|RedirectResponse
    {
        $report = $this->reportRepository->find($id);

        if (empty($report)) {
            flash(__('messages.not_found', ['model' => __('models/reports.singular')]), 'error');

            return redirect(route('reports.index'));
        }

        return view('teacher.reports.edit')->with('report', $report);
    }

    /**
     * Update the specified Raport in storage.
     *
     * @param int $id
     * @param UpdateReportRequest $request
     * @return Redirector|Application|RedirectResponse
     */
    public function update(int $id, UpdateReportRequest $request): Redirector|Application|RedirectResponse
    {
        $report = $this->reportRepository->find($id);

        if (empty($report)) {
            flash(__('messages.not_found', ['model' => __('models/reports.singular')]), 'error');

            return redirect(route('reports.index'));
        }

        $input = $request->all();
        $input['user_id'] = Auth::id();
        $this->reportRepository->update($input, $id);

        flash(__('messages.updated', ['model' => __('models/reports.singular')]), 'success');

        return redirect(route('reports.index'));
    }

    /**
     * Remove the specified Raport from storage.
     *
     * @param int $id
     *
     * @return Redirector|Application|RedirectResponse
     * @throws Exception
     */
    public function destroy(int $id): Redirector|Application|RedirectResponse
    {
        $report = $this->reportRepository->find($id);

        if (empty($report)) {
            flash(__('messages.not_found', ['model' => __('models/reports.singular')]), 'error');

            return redirect(route('reports.index'));
        }

        $this->reportRepository->delete($id);

        flash(__('messages.deleted', ['model' => __('models/reports.singular')]), 'success');

        return redirect(route('reports.index'));
    }
}
