<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;

class UsersExport implements FromView
{
   use Exportable;
   private $date;

   public function view():view{
       return view('EXCEL.exportar', ['users'=> User::get()

       ]);

   }


   public function forDate($date){
       $this -> date =$date;
       return $this;

   }

}


