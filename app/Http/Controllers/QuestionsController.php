<?php

// app/Http/Controllers/PostController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class QuestionsController extends Controller
{
    /**
     * SHow list of question and save user location history.
    */
    public function index(Request $request)
    {
        $userId = Session::get('user_id');
        if($userId){
            //Get the user location details and insert into table.
            $getUserLocationHistory = getUserLocationDetails($request,$userId);
            if(!empty($getUserLocationHistory)){
                DB::table('user_location_history')->insert($getUserLocationHistory);
            }
            //Get the question list 34 first.
            $questions = DB::table('personality_test_questions')->take(5);
            $exists = $questions->count() > 0;  // Use count to check if any records exist
            if ($exists) {
                $questionsData = $questions->get()->toArray();            
                $convertedData = array_map(function($item) {
                    $itemArray = get_object_vars($item);  // Convert the object to an associative array
                    // Convert ObjectId to string
                    if (isset($itemArray['_id']) && $itemArray['_id'] instanceof MongoDB\BSON\ObjectId) {
                        $itemArray['_id'] = (string) $itemArray['_id'];  // Convert ObjectId to string
                    }
                    return $itemArray;
                }, $questionsData);
                usort($convertedData, function($a, $b) {
                    return $a['id'] <=> $b['id'];  // PHP 7+ spaceship operator
                });
                $questions = $convertedData;
                $userId = $userId;
                return view('questions.index', compact('questions','userId'));
            } else {
                return redirect('/');
            }
        }else {
            return redirect('/');
        }        
    }
    /**
     * Submit the answers.
     */
    public function submitAnswers(Request $request)
    {
        $answers = $request->all(); 
        if($answers){
            $userId = DB::table('personality_test_results')->insert([
                'id'                    => Carbon::now()->timestamp,
                'user_id'               => $answers['userId'],
                'test_type'             => "Personality Test",
                'answers'               => json_encode($answers['answers']),
                'hightest_answer'       => $answers['mostPopularAnswer'],
                'hightest_answer_no'    => $answers['mostPopularAnswerNo'],
                'created_at'            => Carbon::now(), 
                'updated_at'            => Carbon::now(), 
            ]);
            $id = (int)$answers['mostPopularAnswerNo'];
            $getData = DB::table('personality_test_master_data')->where('qid',$id)->first();
            return response()->json([
                'message'       => 'Answers submitted successfully',
                'redirect_url'  => url('personality_test/reports').'/'.$getData->qid
            ]);
            
            return response()->json(['message' => 'Answers submitted successfully']);
        }
        
    }
    /**
     * Fetch the data.
     */
    public function reports($id, Request $request)
    {
        if($id){
            $userId = Session::get('user_id');
            $getData = DB::table('personality_test_master_data')->where('qid',(int)$id)->first();
            return view('questions.results', compact('getData','userId'));
        }else {
            return redirect('/');
        }   
    }

    public function know_more(Request $request){
        $userId = Session::get('user_id');
        if($userId){
            return view('questions.knowmore', compact('userId'));
        }else {
            return redirect('/');
        }
    }
}
