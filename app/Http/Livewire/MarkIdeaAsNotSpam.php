<?php

namespace App\Http\Livewire;
use Illuminate\Http\Response;
use Livewire\Component;
use App\Models\Idea;
class MarkIdeaAsNotSpam extends Component
{
    public $idea;

    public function mount(Idea $idea){
        $this->idea=$idea;
    }
    public function markAsNotSpam(){
        if(auth()->guest() || ! auth()->user()->isAdmin()){
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->idea->spam_reports=0;
        $this->idea->save();
        $this->emit('ideaWasMarkedAsNotSpam','Spam Counter was reset!');
    }
    public function render()
    {
        return view('livewire.mark-idea-as-not-spam');
    }
}
