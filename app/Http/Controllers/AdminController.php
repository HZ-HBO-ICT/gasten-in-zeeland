<?php

namespace App\Http\Controllers;

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
     * @return Application|StreamedResponse|RedirectResponse|Redirector
     */
    public function downloadStatusCsV()
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

        # add headers for each column in the CSV download
        array_unshift($list, array_keys($list[0]));

        return response()->streamDownload(function () use (&$list) {
            echo $this->arrayToCsv($list);
        }, 'statuses.csv');
    }

    private function arrayToCsv(array $fields, $delimiter = ',', $enclosure = '"',
                                $encloseAll = false, $nullToMysqlNull = false)
    {
        $delimiter_esc = preg_quote($delimiter, '/');
        $enclosure_esc = preg_quote($enclosure, '/');

        $outputString = "";
        foreach ($fields as $tempFields) {
            $output = array();
            foreach ($tempFields as $field) {
                if ($field === null && $nullToMysqlNull) {
                    $output[] = 'NULL';
                    continue;
                }

                // Enclose fields containing $delimiter, $enclosure or whitespace
                if ($encloseAll || preg_match("/(?:${delimiter_esc}|${enclosure_esc}|\s)/", $field)) {
                    $field = $enclosure . str_replace($enclosure, $enclosure . $enclosure, $field) . $enclosure;
                }
                $output[] = $field . " ";
            }
            $outputString .= implode($delimiter, $output) . "\r\n";
        }
        return $outputString;
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

    public function rapportGenerator()
    {
        return view('admin.rapport_generator', [
            'unverified_users' => User::unverified()->paginate(15),
        ]);
    }

}
