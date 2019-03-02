<?php
/*
$exchange_client = new ExchangeClient();
$exchange_client->init(
    'dc\\' . $_SESSION['automation_UserLogin'],
    @core_decrypt($_SESSION['automation_UserToken']),
    null,
    'Core/vendor/ews/Services.wsdl'
);

$unfiltered_events = @$exchange_client->get_events(date('Y-m-d') . 'T00:00:00', date('Y-m-d') . 'T23:59:59');
$unfiltered_events = json_decode(json_encode($unfiltered_events), 1);
$filter_events = [];

foreach ($unfiltered_events as $event) {

    $filter_events[] = [

        'subject' => $event['subject'],
        'start' => date('d m Y H:i:s', $event['start']),
        'end' => date('d m Y H:i:s', $event['end']),
        'location' => $event['location'],
        'requester' => $event['organizer']['name'],

    ];
}


$unfiltered_email = @$exchange_client->get_messages(5, false, 'inbox');
//$unfiltered_email = json_decode(json_encode($unfiltered_email),1);
$filter_email = [];

foreach ($unfiltered_email as $email) {

    $filter_email[] = [

        'from' => $email->from_name,
        'subject' => $email->subject

    ];
}

?>


<li  class="z-depth-1 t-grey4 responsive-image hoverable" data-row="1" data-col="1" data-sizex="1" data-sizey="2">
    <a href="#">
        <div style="margin-left: 5px; margin-top: 0;" class="row">
            <div class="col 12">
                <h6 class="header tx-magenta">Dashboard</h6>
                <h6 class="black-text">Today's Events </h6>
            </div>
        </div>
        <div class="col 12">

                <?php

                foreach ($filter_events as $event){

                    echo '<h6>'.$event['subject'].'</h6>';
                }
                ?>

            <div class="clearfix"></div>
        </div>
        <div class="col l12 ">
            <h5 class="tx-magenta right modal-trigger" href="#modal1" id="user-inbox"><i class="material-icons font-size-1">inbox</i></h5>
        </div>
    </a>
</li>
<div id="modal1" class="modal">
    <div class="modal-content">
        <h4>Latest Emails</h4>
        <table class="striped highlight responsive-table">
            <thead>
            <tr>
                <th>From</th>
                <th>Subject</th>

            </tr>
            </thead>

            <tbody>
            <?php
echo '<pre>';


            //from_name
            //subject
            //isread
            echo '</pre>';

                        foreach ($unfiltered_email as $item) {

                            ?>

                            <tr>
                                <td><?php
                                    if($item->isread){
                                        echo $item->from;
                                    } else{

                                        echo '<b>'.$item->from.'<b>';
                                    }

                                    ?></td>
                                <td>

                                    <?php
                                    if($item->isread){
                                        echo $item->subject;
                                    } else{

                                        echo '<b>'.$item->subject.'<b>';
                                    }

                                    ?>



                            </tr>
                        <?php
                        }

            ?>


            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
</div>
<?php

*/
