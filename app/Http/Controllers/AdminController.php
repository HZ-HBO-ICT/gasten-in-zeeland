<?php

namespace App\Http\Controllers;

use App\Services\CsvService;
use App\Services\ReportService;
use App\User;
use App\Status;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminController extends Controller
{
    /**
     * Returns the main admin page
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.index', [
            'verified_user_count' => User::verified()->count(),
            'unverified_user_count' => User::unverified()->count(),
            'status_count' => Status::count(),
        ]);
    }

    /**
     * Returns a view to manage the verified users
     *
     * @return Application|Factory|View
     */
    public function verifiedUsers()
    {
        return view('admin.verified_users', [
            'verified_users' => User::verified()->paginate(15),
        ]);
    }

    /**
     * Returns a view to remove unverified users
     *
     * @return Application|Factory|View
     */
    public function unverifiedUsers()
    {
        return view('admin.unverified_users', [
            'unverified_users' => User::unverified()->paginate(15),
        ]);
    }

    /**
     * Deletes all selected users, end redirects back.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function deleteUnverifiedUsers(Request $request)
    {
        User::whereIn('id', $request['ids'])->delete();

        return redirect()->route('admin.unverified_users')
            ->with('success', 'Geselecteerde gebruikers zijn succesvol verwijderd.');

    }

    /**
     * Returns a CSV stream of all statusdata
     *
     * @param CsvService $csvService
     * @return Application|StreamedResponse|RedirectResponse|Redirector
     */
    public function downloadStatusCsV(CsvService $csvService)
    {
        $headers = [
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0'
            , 'Content-type' => 'text/csv'
            , 'Content-Disposition' => 'attachment; filename=statuses.csv'
            , 'Expires' => '0'
            , 'Pragma' => 'public'
        ];

        $list = $this->getStatusData();

        if (count($list) === 0) {
            return redirect('admin')->with('warning', __('No registrations to download'));
        }

        return $csvService->streamDownload($list, 'statuses.csv');
    }

    /*
     * Returns the dataset to be downloaded
     * @return array
     */
    private function getStatusData()
    {
        $result = [];
        $statuses = Status::orderBy('measured_at')->get();

        foreach ($statuses as $status) {
            $row = $status->toArray();
            $user = $status->user->toArray();
            // Unset irrelevant data
            unset($user['id']);
            unset($user['isAdmin']);

            // Append user data to row
            foreach (array_keys($user) as $key) {
                $row['user_' . $key] = $user[$key];
            }
            $result[] = $row;
        }

        return $result;
    }

    public function showDailyReport(ReportService $service)
    {
        return view('admin.rapport_generator', [
            'report_data' => $service->getReportData(),
        ]);
    }

    public function downloadReportCSV(ReportService $reportService, CsvService $csvService)
    {
        $header = [
            __('app.measured_at'),
            __('app.number_of_registrations'),
            __('app.daily_capacity'),
            __('app.daily_max_capacity'),
            __('app.percentage_capacity'),
            __('app.number_of_overcrowded_registrations')
        ];

        $list = $reportService->getReportData();

        return $csvService->streamDownload($list, 'daily_report.csv', $header);
    }

}
