<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateEvent;
use App\Models\Event;
use DateTime;

class EventController extends Controller
{
    public function index(){
        $events = Event::get();
        $atualDate = new DateTime(date("m.d.y"));
        $counter = 0;
        return view('admin.index', compact('events','atualDate', 'counter'));
    }

    public function store(StoreUpdateEvent $request){
        Event::create($request->all());

        return redirect()->route('events.index')->with('message', 'Evento criado com sucesso!');
    }

    public function destroy($id){
        if (!$event = Event::find($id)) {
            return redirect()->route('events.index');
        }
        $event->delete();

        return redirect()->route('events.index')->with('message', 'Evento deletado com sucesso!');
    }

    public function edit($id){
        if (!$event = Event::find($id)){
            return redirect()->route('events.index')->with('error', 'Não exite um evento com o id especificado');
        }

        return view('admin.edit', compact('event'));
    }
}
