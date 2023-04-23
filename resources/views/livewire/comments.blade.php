<div>
    <div class="container border p-3 rounded" style="background-color: rgb(206, 230, 230)">
        <p class=""><b>Offer Comments</b></p>
        <div id="comentScroll" class="overflow-auto bg-light rounded p-3" style="max-height: 20em;">
            @foreach ($comments as $comment)
                @if($car == $comment->car_id) 
                    @if ($comment->user->name == auth()->user()->name)
                        <div class="mb-4" >
                            <pre><b class="text-secondary">{{ $comment->user->name }}</b></pre>
                            <form id="form-{{$comment->id}}" class="d-none"  wire:submit.prevent="update({{$comment->id}})">
                                <p>                                 
                                    <input id="cmt-input-{{$comment->id}}" type="text" wire:model.defer="updateComment" class="p-1 rounded border" value="">
                                    <button onclick="showComment('')" class="btn btn-secondary" type="submit" style="font-size: .8em">Save</button>
                                </p>
                            </form>
                            <p id="cmt-txt-{{$comment->id}}" class="mx-4 text-dark p-1">{{ $comment->content }}
                            <br> <span class="text-secondary " style="font-size: .7em">{{ $comment->created_at->diffForHumans() }}</span> <br>
                            <span class="">
                                <button class="text-ligth fw-bold btn btn-link text-decoration-underline p-0" onclick="showComment('{{ $comment->id }}')" style="font-size: .8em">Edit</button> 
                                <button onclick="return confirm('Your Comment Will Be Deleted')" wire:click="destroy({{$comment->id}})" class="fw-bold btn btn-link text-decoration-underline text-danger p-0" style="font-size: .8em;">Delete</button>
                            </span> </p>
                        </div>
                    @else
                        <div class="mb-4">
                            <pre class="my-1"><b class="text-secondary">{{ $comment->user->name }}</b></pre>
                            <p class="mx-4 text-dark p-1" style="">{{ $comment->content }} <br>
                            <span class="text-secondary" style="font-size: .7em">{{ $comment->created_at->diffForHumans() }}</span> </p>
                        </div>
                    @endif
                @endif        
            @endforeach
        </div>
        <hr class="my-3">
        <div class="container ">
            <form class="row" wire:submit.prevent="sendText">
                <input wire:model="commentText" type="text" class="col form-control" placeholder="Share a Comment .." />
                <button onclick="" class="col-2 mx-2 btn btn-secondary bg-primary text-light" type="submit"><i class="bi bi-send"></i></button>
            </form>
        </div>  
        @if (session('alert'))
            <small class="ms-1 text-danger">{{session('alert')}}</small>
        @endif
    </div>
    <script>
        function showComment(cmtID){
            document.querySelector("#cmt-txt-"+cmtID).setAttribute('class', 'd-none');
            document.querySelector("#cmt-input-"+cmtID).value = document.querySelector("#cmt-txt-"+cmtID).innerHTML
            document.querySelector("#form-"+cmtID).setAttribute('class', 'd-block');
        }
    </script>
    {{-- <script>
        var element = document.querySelector('#comentScroll');
        function scrollToTop() {
            element.scrollTop = element.scrollHeight;;
        }
    </script> --}}
</div>
