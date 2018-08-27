<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Post;
use App\User;
use Auth;
use App\Category;
use App\Answer;
use Validator;
use App\File;
use App\Narasumber;
use App\Comment;

class WORDController extends Controller
{
    public function createWordDocx($id)
    {
    	$posts = Post::find($id);
        $cid = $posts->category_id;
        $pid = $posts->id;
        $categories = Category::where("id", $cid)->first();
        //$posting = Post::with('narasumber')->where('post_id', $pid)->get();
    	$answers = Answer::with('question')->where('post_id', $pid)->get();
        //$narasumber = $posts->narasumber()->get();
    	
        $wordTest = new \PhpOffice\PhpWord\PhpWord();
        $newSection = $wordTest->addSection(array('paperSize' => 'A4', 'marginLeft' => 1500, 'marginRight' => 1500, 'marginTop' => 1500, 'marginBottom' => 1500));


        $fontStyle = array('name' => 'Times New Roman', 'size' => 14, 'space' => array('before' => 360, 'after' => 480));
            $newSection->addText('Penulis           : ' . $posts->penulis1 . '; ' . $posts->penulis2, $fontStyle);
            $newSection->addText('Topik/Judul    : ' . $posts->topic, $fontStyle);
            $newSection->addText('Lembaga        : ' . $posts->lembaga, $fontStyle);
            
            $newSection->addText('Narasumber   : ', $fontStyle);
            
            $i = 1;
            foreach ($posts->narasumber as $nara){
                if(($nara->nama)!=NULL){
                    $newSection->addText('                      ' .$i.'. ' .$nara->nama. ' ('.$nara->kontak. ')', $fontStyle);
                    $i++;
                }
            }
            
            

		
        if(($posts->isi)==NULL)
        {
        	
            $lineStyle = array('weight' => 2, 'width' => 443, 'height' => 0, 'color' => 000000);
            $newSection->addLine($lineStyle);

            $fontQ = array('name' => 'Times New Roman', 'bold' => TRUE, 'size' => 12);
            $fontA = array('name' => 'Times New Roman', 'size' => 12);
            $para = array('space' => array('before' => 250, 'after' => 50));
            $i = 1;
        	foreach ($answers as $answer) {
        		foreach ($answer->question()->get() as $question) {
        			$newSection->addText($i . '. ' .
        				$question->question, 
        				$fontQ,
                        $para
        			);
                    $i++;
        			$newSection->addText('   ' .$answer->answer, $fontA);
        		}   		
        	}
        } else{
            $lineStyle = array('weight' => 2, 'width' => 443, 'height' => 0, 'color' => 000000);
            $newSection->addLine($lineStyle);

            $fontQ = array('name' => 'Times New Roman', 'bold' => TRUE, 'size' => 12);
            $fontA = array('name' => 'Times New Roman', 'size' => 12);
            $para = array('space' => array('before' => 250, 'after' => 50));
            
            
                    $newSection->addText($posts->isi, 
                        $fontA,
                        $para
                    );        
            
        }
    		

    	$objectWriter = \PhpOffice\PhpWord\IOFactory::createWriter($wordTest, 'Word2007');
    	try{
    		$objectWriter->save(storage_path($posts->penulis1.';'.$posts->penulis2.'_'.$posts->topic.'.docx'));
    	} catch(Exception $e) {

    	}
    	return response()->download(storage_path($posts->penulis1.';'.$posts->penulis2.'_'.$posts->topic.'.docx'));

    	
    }
}
