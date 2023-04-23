<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class Comments extends Component
{
    public $commentText;
    public $carId;
    public $updateComment;
    
    public function sendText()
    {
        if($this->commentText == null){
          return  session()->flash('alert', 'Comment text is requered!');
        }
        Comment::create(
            [
            'user_id' => auth()->user()->id,
            'content' => $this->commentText,
            'car_id' => $this->carId,
        ]);
        $this->reset('commentText');
    }

    public function render()
    {
        return view('livewire.comments',['car' => $this->carId,
        'comments' => Comment::all()
        ]);
    }

    public function destroy($id){
        $comment = Comment::find($id);
        $comment->delete();
    }


    public function update($id){

        if($this->updateComment == null){
            $comment = Comment::find($id);
            $comment->delete();
            return;
          }

        $comment = Comment::find($id);
        $comment->update(
            [
            'user_id' => auth()->user()->id,
            'content' => $this->updateComment,
            'car_id' => $this->carId,
        ]);
    }
}
