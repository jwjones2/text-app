<?php

namespace App\Http\Controllers;

// use REST API 
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use \App\Contact;

class SmsController extends Controller
{
    /**
     * Sends sms to user using Twilio's programmable sms client
     * @param String $message Body of sms
     * @param Number $recipients string or array of phone number of recepient
     */
    private function send_message($message, $recipients)
    {
        $account_sid = env("TWILIO_SID", 'false');
        $auth_token = env("TWILIO_TOKEN", 'false');
        $twilio_number = env("TWILIO_FROM", 'false');
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($recipients, 
                ['from' => $twilio_number, 'body' => $message] );
    }

    public function send () {
        $title = 'Praise Text Alert Program';
        // uses the Twilio Api to make send the message

        // get variables from POST request
        $message = request('message') ?: '';
        $send_to = request('send_to') ?: null;

        // append this to end of every message
        $tag = "\n\nReply REMOVE to unsubscribe.  Msg & Data Rates may apply.";

        // send the message with the client object
        /* check the send_to input to see who to send the message to 
        * 
        * SET QUERY ACCORDING TO SENDTO
        * 
        * Default is everyone in contacts list. (if send_to is null)
        ***/
        //if ( $send_to == 'all' || $send_to == null ) {
            $contacts = Contact::all();
        //} else {  
            // check group members by id to send (only building query here)
        //    $query = 'SELECT t2.number FROM group_members as t1 INNER JOIN contacts as t2 ON t1.contact_id = t2.ID WHERE t1.group_id = ' . $send_to . ';';
        //}
        foreach ( $contacts as $contact ) {
            file_put_contents('log.txt', '<h1>Sending to ' . $contact->number . '</h1>', FILE_APPEND);
            try {
                $this->send_message(
                    $message . $tag,
                    $contact->number
                );
            } catch (Exception $e) {
                file_put_contents('log.txt', '<h1>Error sending message (send to: ' . $send_to . ')</h1>', FILE_APPEND);
                
                // redirect with error message
                return redirect()->route('/')->with(['title'=>$title, 'error' => 'Could not send the message. See log.txt for errors.']);
            }
        }

        return redirect()->route('/')->with(['title'=>$title, 'success' => 'The message was sent!']);
    }
}
