<?php
  $name= $_POST['name'];
  $email= $_POST['email'];
  $phone= $_POST['phone'];
  $amount= $_POST['amount'];

  include 'instamojo/Instamojo.php';
  $api = new Instamojo\Instamojo('test_6e7cb16e7a6f695b046a06f08c8', 'test_8488bd86e323af64b147f175a82',
  'https://test.instamojo.com/api/1.1/');

  try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => "Donation for Hopeless People",
        "amount" => $amount,
        "send_email" => true,
		"name" => $name,
        "email" => $email,
        "phone" => $phone,
        "send_sms" => true,
		"allow repeated payment"=>false,
        "redirect_url" => "http://nitheshreddy.byethost12.com/donate/thank.html"
        //"webhook" =>
        ));
        //print_r($response);
        $pay_url=$response['longurl'];
        header("location:$pay_url");
  }
  catch (Exception $e) {
      print('Error: ' . $e->getMessage());
  }
?>