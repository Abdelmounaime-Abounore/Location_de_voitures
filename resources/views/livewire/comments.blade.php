<div class="container border p-3 rounded" style="background-color: rgb(239, 239, 236)">
    <div class="col-12 mb-3">
        <p class=" me-2"><b>Add your comment</b></p>
    </div>
    <div id="comentScroll"  class="overflow-auto mb-3 p-3 bg-light rounded"style="max-width: 100%; max-height: 20em;">
        @foreach ($comments as $comment)
            @if($car == $comment->car_id)
                @if ($comment->user->name == auth()->user()?->name || auth()->user()->hasRole('admin'))
                    <div class="incoming_msg mb-4" >      
                        <pre><i class="fa-solid fa-user-large"></i> <b>{{ $comment->user->name }}</b></pre>
                        <div class="received_msg mt-1" style="overflow-wrap: break-word;">
                            <form id="form-{{$comment->id}}" class="d-none"  wire:submit.prevent="update({{$comment->id}})">
                                <p>                                 
                                    <input id="cmt-input-{{$comment->id}}" type="text" wire:model.defer="updateComment" class="p-1 coment-content-input rounded border" value="">
                                    <button onclick="showComment('')" class="edit-btn-dark btn btn-secondary" type="submit"><b class="text-lught" style="font-size: .8em">Save</b></button>
                                </p>
                            </form>
                            <p id="cmt-txt-{{$comment->id}}" class="my-2 ms-4 text-secondary text-wrap">{{ $comment->content }}</p>
                            <span class="text-secondary ms-4" style="font-size: .7em">{{ $comment->created_at->diffForHumans(null, false, false) }}</span>
                            <span>
                                <button onclick="showComment('{{ $comment->id }}')" class="btn btn-primary"><b class="text-light" style="font-size: .8em">Edit</b></button> 
                                <span><button wire:click="destroy({{$comment->id}})" onclick="return confirm('Are you sure?')" class="text-light class btn btn-danger" style="font-size: .8em;"><b>Delete</b></button></span>
                            </span>
                        </div>
                    </div>
                @else
                    <div class="incoming_msg mb-4">
                        <pre><i class="fa-solid fa-user-large"></i> <b>{{ $comment->user->name }}</b></pre>
                        <div class="received_msg mt-1" style="overflow-wrap: break-word;">
                            <p class="my-2 ms-4 text-secondary " >{{ $comment->content }}</p>
                            <span class="text-secondary ms-4" style="font-size: .7em">{{ $comment->created_at->diffForHumans(null, false, false) }}</span>
                        </div>
                    </div>
                @endif
            @endif      
        @endforeach
    </div>
    @auth
    <hr class="my-3">
    <div class="container">
        <form class="row" wire:submit.prevent="sendText">
            <input wire:model="commentText" type="text" class="col form-control" placeholder="your comment" />
            <button onclick="scrollToTop()" class="col-2 ms-2 btn btn-dark bg-primary text-light" type="submit"><i class="bi bi-send"></i></button>
        </form>
    </div>  
    @if (session('alert'))
        <small class="ms-1 text-danger">{{session('alert')}}</small>
    @endif
    @else
    <hr class="my-3">
    <div class="container ">
        <div class="row">
            <input type="text" class="col form-control" placeholder="your comment" />
            <button href="#modal-comment" data-bs-toggle="modal" class="col-2 ms-2 btn btn-dark bg-dark text-light"><i class="bi bi-send"></i></button>
        </div>
    </div> 
    @endauth 
    <div class="my-3">
        <a href="{{route("home")}}" class="btn btn-secondary text-light">Go Back</a>
    </div>   
</div>
    <script>
        function showComment(cmtID){
            document.querySelector("#cmt-txt-"+cmtID).setAttribute('class', 'd-none');
            document.querySelector("#cmt-input-"+cmtID).value = document.querySelector("#cmt-txt-"+cmtID).innerHTML
            document.querySelector("#form-"+cmtID).setAttribute('class', 'd-block');
        }
    </script>
    <script>
        var element = document.querySelector('#comentScroll');
        function scrollToTop() {
            element.scrollTop = element.scrollHeight;;
        }
    </script>
</div>
