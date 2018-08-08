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
    public function createWordDocx()
    {
    	$wordTest = new \PhpOffice\PhpWord\PhpWord();
    	$newSection = $wordTest->addSection(array('paperSize' => 'A4', 'marginLeft' => 1500, 'marginRight' => 1500, 'marginTop' => 1500, 'marginBottom' => 1500));


    	$posts = Post::first();
        $cid = $posts->category_id;
        $pid = $posts->id;
        $categories = Category::where("id", $cid)->first();
        $posting = Post::with('narasumber')->get();
    	$answers = Answer::with('question')->where('post_id', '1')->get();
        $narasumber = $posts->narasumber()->get();
    	


  //   	$styleTable = array('borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 80);
		// $styleFirstRow = array('borderBottomSize' => 18, 'borderBottomColor' => '0000FF', 'bgColor' => 'FFFFFF');
		// $styleCell = array('valign' => 'center');
		// //$styleCellBTLR = array('valign' => 'center', 'textDirection' => \PhpOffice\PhpWord\Style\Cell::TEXT_DIR_BTLR);
		// $fontStyle = array('bold' => true, 'align' => 'center');
		// $wordTest->addTableStyle('Fancy Table', $styleTable, $styleFirstRow);
		// $table = $newSection->addTable('Fancy Table');
		// $table->addRow(100);
		// $table->addCell(5000, $styleCell)->addText('Penulis');
		// $table->addCell(5000, $styleCell)->addText('1. '.$posts->penulis1 . '
		// 	' . '2. '.$posts->penulis2, $fontStyle);
		//$table->addCell(2000, $styleCell)->addText($posts->topic, $fontStyle);
		

    	$fontStyle = array('name' => 'Times New Roman', 'size' => 14, 'space' => array('before' => 360, 'after' => 480));
    	$newSection->addText('Penulis           : ' . $posts->penulis1 . ' dan ' . $posts->penulis2, $fontStyle);
    	$newSection->addText('Topik             : ' . $posts->topic, $fontStyle);
        $newSection->addText('Lembaga        : ' . $posts->lembaga, $fontStyle);
        
        $newSection->addText('Narasumber   : ', $fontStyle);
        $i = 1;
        foreach ($posting as $posti) {
            foreach ($posti->narasumber()->get() as $nara){
                $newSection->addText('                      ' .$i.'. ' .$nara->nama. ' ('.$nara->kontak. ')', $fontStyle);
                $i++;
            }
        }
        

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
    		

    	$objectWriter = \PhpOffice\PhpWord\IOFactory::createWriter($wordTest, 'Word2007');
    	try{
    		$objectWriter->save(storage_path('Test.docx'));
    	} catch(Exception $e) {

    	}
    	return response()->download(storage_path('Test.docx'));

    	
    }
}
