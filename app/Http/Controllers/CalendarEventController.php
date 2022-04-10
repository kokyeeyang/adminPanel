<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Employee;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class CalendarEventController extends Controller
{
    public function index(){
        $employeeId = Employee::select('id')
                    ->where('user_id', '=' ,auth()->user()->id);
        if(request()->ajax()){
            $start = !empty($_GET['start']) ? $_GET['start'] : ('');
            $end = !empty($_GET['end']) ? $_GET['end'] : ('');
            $data = Event::whereDate('start', '>=', $start)->whereDate('end', '<=', $end)->get(['id','title','start', 'end']);
            return response()->json($data);        
        }

        return view('fullcalendar');

    }

    public function create(Request $request){
        $employeeId = Employee::viewEmployeeId(auth()->user()->id)->id;
        $insertArr = [
                      'employee_id' => $employeeId,
                      'title' => $request->title,
                      'start' => $request->start,
                      'end' => $request->end
                     ];
        $event = Event::insert($insertArr);

        return Response::json($event);
    }

    public function update(Request $request){
        $where = ['id' => $request->id];
        $updateArr = ['employee_id' => $request->employee_id, 'title'=>$request->title,'start'=>$request->start,'end'=>$request->end];
        $event  = Event::where($where)->update($updateArr);

        return Response::json($event);
    }

    public function destroy(Request $request)

    {

        $event = Event::where('id',$request->id)->delete();

        return Response::json($event);

    }  
}
