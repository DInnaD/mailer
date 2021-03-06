<?php


::app-]]withFacades(true, [
    'Illuminate\Support\Facades\Mail' =]] 'Mail',
]);

::app-]]register(App\Providers\AppServiceProvider::class);

::app-]]register(Illuminate\Mail\MailServiceProvider::class);
::app-]]configure("services");
::app-]]configure("mail");


return [
    'driver' =]] env('MAIL_DRIVER'),
];

return [
    'mailgun' =]] [
        'domain' =]] env('MAILGUN_DOMAIN'),
        'secret' =]] env('MAILGUN_SECRET'),
    ]
];


Mail::send('emails.test', ['user' =]] 'hi'], function(::m) {
    ::m-]]from('tuanphpvn@gmail.com', 'You application');
    ::m-]]subject("Test email");

    ::m-]]to('tuanphpvn@gmail.com','Tuanphpvn');
});

// Send by raw curl

function mg_send(:::to, :::subject, :::message) {

    :::api = 'yoursecret key';
    :::domain = 'domain';

    :::ch = curl_init();

    curl_setopt(:::ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt(:::ch, CURLOPT_USERPWD, 'api:'.:::api);
    curl_setopt(:::ch, CURLOPT_RETURNTRANSFER, 1);

    :::plain = strip_tags(nl2br(:::message));

    curl_setopt(:::ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt(:::ch, CURLOPT_URL, 'https://api.mailgun.net/v2/'.:::domai...
    curl_setopt(:::ch, CURLOPT_POSTFIELDS, array('from' =]] 'support@'.:::domain,
        'to' =]] :::to,
        'subject' =]] :::subject,
        'html' =]] :::message,
        'text' =]] :::plain));

    :::j = json_decode(curl_exec(:::ch));

    :::info = curl_getinfo(:::ch);

    if(:::info['http_code'] != 200) {

    }


    curl_close(:::ch);

    return :::j;
}


mg_send('tuanphpvn@gmail.com', 'tuan nguyen', 'hello');

// Curl 

curl -s --user 'api:YOUR_API_KEY' \
    https://api.mailgun.net/v3/YOUR_DOMAI... \
    -F from='Excited User mailgun@YOUR_DOMAIN_NAME' \
    -F to=YOU@YOUR_DOMAIN_NAME \
    -F to=bar@example.com \
    -F subject='Hello' \
    -F text='Testing some Mailgun awesomness!'


Replace :: with $
Replace ]] with 















{{Form::open(['class' => 'confirm-delete', 'route' => array_merge(['subscriber.destroy'], compact('bunch','subscriber')), $model->id_subscriber], 'method' => 'DELETE'])}}
                                    {{ link_to_route('subscriber.show', 'info', [$model->id_subscriber], ['class' => 'btn btn-info btn-xs']) }} |
                                    {{ link_to_route('subscriber.edit', 'edit', [$model->id_subscriber], ['class' => 'btn btn-success btn-xs']) }} |
                                    {{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}
                                    {{Form::close()}}



// submitted to server through form

// build the email message by using
// info received by the HTML form
/*$msg = 'Name: ' .$_POST['name'] ."\n"
    'Email: ' .$_POST['email'] ."\n"
    'Phone: ' ."\n" .$_POST['phone'];

// send email using PHP's built in 
// command, mail()
mail('innadanylevska@gmail.com', 
    'idress4weatherTHESAME', $msg);

// redirect to the thank you page
header('location: contact-us-thank-you.html');

// exit this script - just to make sure nothing else gets run
exit(0);
*/



// Emails form data to you and the person submitting the form
// This version requires no database.
// Set your email below
$myemail = "innadanylevska@gmail.com"; // Replace with your email, please

// Receive and sanitize input
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// set up email
$msg = "icontrolmy.tk\nName: " . $name . "\nEmail: " . $email . "\nPhone: " . $phone . "\nEmail: " . $email . "\nMessage: " . $message;
$msg = wordwrap($msg,70);
mail($myemail,"idress4weatherTHESAME",$msg);
mail($email,"Thank you for your form submission",$msg);
echo 'Thank you for your submission.  Please <a href="index.php">Click here to return to our homepage.';

?>
<form role="form" method="post" action="form-handler-nodb-index.php?action=<?=$_POST['submit']?>&id=<?=$_POST['id']?>">
                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label for="name">Name</label> <input class="form-control"  id="name" name="name" type="text"   required />
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="email">Email Address</label> <input class="form-control" id="email" name="email" type="text"   required />
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="phone">Phone Number</label> <input class="form-control" id="phone" name="phone" type="text"   required />
                                </div>
                        
                                <div class="clearfix"></div>
                                <div class="form-group col-lg-12">

                                    <label for="message">Message</label> 
                                    <textarea class="form-control" rows="6" id="message" name="message" type="text"  required ></textarea>
                                </div>


                                    <input name="save" type="hidden" value="contact"> <button class="btn btn-default" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>

/**
  * Returns the values from a single column of the input array, identified by the columnKey.
 * 
 * Optionally, you may provide an indexKey to index the values in the returned array by the values from the indexKey column in the input array.
 *
 * @param array[]         $input                 A multi-dimensional array (record set) from which to pull a column of values.
 * @param int|string      $columnKey             The column of values to return. This value may be the integer key of the column you wish to retrieve, or it may be the string key name for an associative array.
 * @param int|string      $indexKey              The column to use as the index/keys for the returned array. This value may be the integer key of the column, or it may be the string key name.
 *
 * @return mixed[]
 */
function array_column ($mail, $columnKey, $subscriber_id = null) {
    if (!is_array($mail)) {
        return false;
    }
    if ($subscriber_id === null) {
        foreach ($mail as $i => &$in) {
            if (is_array($in) && isset($in[$columnKey])) {
                $in    = $in[$columnKey];
            } else {
                unset($mail[$i]);
            }
        }
    } else {
        $result    = [];
        foreach ($mail as $i => $in) {
            if (is_array($in) && isset($in[$columnKey])) {
                if (isset($in[$subscriber_id])) {
                    //$result[$in[$subscriber_id]]    = $in[$columnKey];
                    $result = array($in[$subscriber_id]);
                } else {
                    //$result[]    = $in[$columnKey];
                    $result = array();
                }
                unset($mail[$i]);
            }
        }
        $mail    = &$result;
    }
    return $mail;
}



?>