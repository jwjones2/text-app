<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\hook_responses;
use App\hooks;
use Twilio\Rest\Client;

class PagesController extends Controller
{
    public function index () {
        $title = 'Praise Text Alert Program';
        
        // send groups to page for sending message
        $groups = Group::all();

        return view('pages.index')->with(['title' => $title, 'groups' => $groups]);
    }

    public function questions ( ) {
        // get all the hooks and display
        $hooks = hooks::all();

        $title = "Questions";
        return view('pages.questions')->with([
            'title' => $title,
            'hooks' => $hooks
        ]);
    }

    public function responses ( ) {
        // get all the hooks and display
        $hooks = hooks::all();

        $title = "Responses to Questions";
        return view('pages.hook_responses')->with([
            'title' => $title,
            'hooks' => $hooks
        ]);
    }

    public function pricing () {
        $title = 'Twilio Pricing Records';

        // date stuff for forward and back month buttons
        $year = date('Y');
        if ( isset($_GET['year']) && $_GET['year'] != '' ) 
            $year = $_GET['year'];

        $month = date('m');
        if ( isset($_GET['month']) && $_GET['month'] != '' ) {
            $month = $_GET['month'];
            if ( $month < 1 ) {
                $month = 12;
                $year -= 1;
            } elseif ( $month > 12 ) {
                $month = 1;
                $year += 1;
            }
        }

        $first_of_month = "$year-$month-01";
        $last_of_month = date('Y-m-t', strtotime($first_of_month));
        $title_date = date('F  Y', strtotime($first_of_month));

        // twilio client
        $client = new Client(env('TWILIO_SID', false), env('TWILIO_TOKEN', false));

        // usage records
        $usage_records = $client->usage->records->read(
            array(
                "category" => "sms",
                "startDate" => $first_of_month,
                "endDate" => $last_of_month
            )
        );

        // sms records
        $sms_records = $client->usage
            ->records
            ->read(
                array(
                    "category" => "sms",
                    "startDate" => $first_of_month,
                    "endDate" => $last_of_month
                )
        );

        return view('pages.pricing')->with([
            'title' => $title,
            'month' => $month,
            'year' => $year,
            'first_of_month' => $first_of_month,
            'last_of_month' => $last_of_month,
            'title_date' => $title_date,
            'usage_records' => $usage_records,
            'sms_records' => $sms_records
        ]);
    }

    public function clear_logs () {
        // clear logs by emptying the file.  First make a backup
        file_put_contents('backup_log.txt', file_get_contents('log.txt') );
        file_put_contents('log.txt', '');

        return view('pages.logs')->with([
            'title' => 'Program Logs',
            'success' => 'The logs were cleared!  A backup was make in backup_log.txt'
        ]);
    }

    public function logs () {
        return view('pages.logs')->with('title', 'Program Logs');
    }
}
