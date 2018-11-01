<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MessageService;


class MessageController extends Controller
{
  /**
   * Received an email with a REST Request
   * from a Mailgun
   */
  public static function recievedMailREST(Request $request)
  { 
    $messageService = new MessageService();
    return $messageService->receivedMessageREST($request);
  }

  /**
   * Received an email with a array in the body
   * from GraphQL
   */
  public static function recievedMailGQL($message)
  {
    $messageService = new MessageService();
    return $messageService->receivedMessageGQL($message);
  }
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {

  }

}

?>