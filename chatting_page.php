<?php 
   include 'php/connect.php';
  $data= $_SESSION["id"];
  $profile= $_SESSION["profile"];
?>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/chatting_page.css">
<div class="container">
    <div class="panel messages-panel">
        <div class="contacts-list">
            <div class="inbox-categories">
                <div data-toggle="tab" data-target="#inbox" class="active"> Inbox </div>
                <div data-toggle="tab" data-target="#sent"> Sent </div>
                <div data-toggle="tab" data-target="#marked"> Marked </div>
                <div data-toggle="tab" data-target="#drafts"> Drafts </div>
            </div>
        </div>
        </div>
        

            <div class="tab-pane message-body" id="inbox-message-4">
                <!-- <div class="message-top">
                    <a class="btn btn btn-success new-message"> <i class="fa fa-envelope"></i> New Message </a>

                    <div class="new-message-wrapper">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Send message to...">
                            <a class="btn btn-danger close-new-message" href="#"><i class="fa fa-times"></i></a>
                        </div>

                       
                    </div>
                </div> -->

                <div class="message-chat">
                    <div class="chat-body">
                        <div class="message info">
                            <img alt="" class="img-circle medium-image" src="https://bootdey.com/img/Content/avatar/avatar1.png">

                            <div class="message-body">
                                <div class="message-info">
                                    <h4> Jonahtan Ive </h4>
                                    <h5> <i class="fa fa-clock-o"></i> 6:12 PM </h5>
                                </div>
                                <hr>
                                <div class="message-text">
                                    I'm coming to your place at 9 pm and I hope you'll have those tasty brownies again 
                                </div>
                            </div>
                            <br>
                        </div>

                        <div class="message my-message">
                            <img alt="" class="img-circle medium-image" src="https://bootdey.com/img/Content/avatar/avatar1.png">

                            <div class="message-body">
                                <div class="message-body-inner">
                                    <div class="message-info">
                                        <h4> Dennis Novac </h4>
                                        <h5> <i class="fa fa-clock-o"></i> 6:16 PM </h5>
                                    </div>
                                    <hr>
                                    <div class="message-text">
                                        Ye, I still have a bag full of them.
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>

                        <div class="message info">
                            <img alt="" class="img-circle medium-image" src="https://bootdey.com/img/Content/avatar/avatar1.png">

                            <div class="message-body">
                                <div class="message-info">
                                    <h4> Jonahtan Ive </h4>
                                    <h5> <i class="fa fa-clock-o"></i> 6:12 PM </h5>
                                </div>
                                <hr>
                                <div class="message-text">
                                    Great, we have a lot of work to do and we need fuel :D
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="message info">
                            <img alt="" class="img-circle medium-image" src="https://bootdey.com/img/Content/avatar/avatar1.png">

                            <div class="message-body">
                                <div class="message-info">
                                    <h4> Jonahtan Ive </h4>
                                    <h5> <i class="fa fa-clock-o"></i> 6:13 PM </h5>
                                </div>
                                <hr>
                                <div class="message-text">
                                    And invite Daniel too, please.
                                </div>
                            </div>
                            <br>
                        </div>

                    </div>

                    <div class="chat-footer">
                        <textarea class="send-message-text"></textarea>
                        <label class="upload-file">
                            <input type="file" required="">
                            <i class="fa fa-paperclip"></i>
                        </label>
                        <button type="button" class="send-message-button btn-info"> <i class="fa fa-send"></i> </button>
                    </div>
                </div>
            </div>

           


        </div>
    </div>
