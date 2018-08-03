<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class LaporanController extends Controller
{
  public function masuk()
  {

      return view('lap_masuk');
  }

  public function laprevisi()
  {

      return view('lap_revisi');
  }

  public function lapselesai()
  {

      return view('lap_selesai');
  }


}
