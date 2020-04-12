<?php

namespace App\Http\Controllers;

use App\Event;
use App\Section;
use App\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        if (auth()->user()->is_admin != 1) {
            return view('admin/no_admin');
        }
        $events = Event::all();
        $users = User::all();
        $i = 1;
        $data = [];
        foreach ($events as $item){
            if($item->manager > 0){
                foreach ($users as $item1){
                    if ($item->manager == $item1->id){
                        $manager = $item1->firstname;
                    }
                }
            }
            $data[$i] = [
                'name' => $item->name,
                'date' => $item->date,
                'manager' => $manager,
            ];
            $i = $i+1;
        };
//        dd($events);
        return view('admin/event', ['data'=>$events]);
    }

    public function add_manager(Event $event)
    {
        $users = User::all();
        $managers = [];
        $i = 1;
        foreach ($users as $item){
            if ($item->is_manager == 1) {
                $managers[$i]=$item;
                $i = $i + 1;
            }
        }

        return view('admin/add_manager', [
            'data'=>$event,
            'manager'=>$managers,
        ]);
    }

    public function manager_add(Event $event, Request $request)
    {
        $event->update([
           'manager'=>$request->manager,
        ]);

        return redirect('event');
    }

}
