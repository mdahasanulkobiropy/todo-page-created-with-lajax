@foreach ($tasks as $task)
    <div class="modal task-modal fade updatemodal" id="updateTaskModal{{$task->id}}" aria-labelledby="updateTaskModalLabel" aria-hidden="true">

        <div class="modal-dialog m-0 w-100 h-100 position-fixed">
            <div class="modal-content border-0 rounded-0 h-100">
                <div class="modal-header border-0 rounded-0">
                    <button type="button" id="completeStatusButton" value="{{$task->id}}" class="btn-outline btn-outline--secondary btn-sm">Mark Complete</button>
                    <button type="button" class="close shadow-none" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body custom-scrollbar">
                    <form action="#!" class="task-modal__form needs-validation" novalidate>
                        <div class="form-group">

                            <label for="title" class="form-group-label">Title</label>
                            <input type="text" id="updatetitle{{$task->id}}" name="title" class="form-control bg-transparent" value="{{$task->title}}" >
                        </div>
                        <div id="updatetitleErorr" class=" text-danger">
                        </div>

                        <div class="form-group">
                            <label for="task-assigned" class="form-group-label d-block">Assignee</label>
                            <select name="user_id[]" class="custom-select updateuser_id{{$task->id}} form-control  bg-transparent task-assigned" data-placeholder="Assignee Name" multiple="multiple">
                                @foreach ($users as $user)
                                    <option data-img="{{asset('frontend')}}./assets/images/avatars/avatar-s-1.jpg" {{$task->getUser()->where('user_id', $user->id)->exists() ? 'selected':''}} value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div id="updateuser_idErorr" class=" text-danger">
                        </div>


                        <div class="form-group">
                            <label for="dueDate" class="form-group-label">Due Date</label>
                            <input type="date" id="updatedueDate{{$task->id}}" name="dueDate" class="  form-control bg-transparent" value="{{$task->dueDate}}">
                        </div>
                        <div id="updatedueDateErorr" class=" text-danger">
                        </div>
                        <div class="form-group">
                            <label for="task-tags" class="form-group-label d-block">Tags</label>
                            <select name="tag_id[]" class="show-tag-btn__color updatetag_id{{$task->id}} custom-select form-control bg-transparent task-tags" multiple="multiple">
                                @foreach ($tags as $tag)
                                <option {{$task->getTag()->where('tag_id', $tag->id)->exists() ? 'selected':''}} value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="updatetag_idErorr" class=" text-danger">
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-group-label">Description</label>
                            <textarea name="description" id="updatedescription{{$task->id}}" class="form-control form-control--textarea bg-transparent">{{$task->description}}</textarea>
                        </div>
                        <div id="updatedescriptionErorr" class=" text-danger">
                        </div>
                        <div>
                            <button type="button" id="updateButtonId" value="{{$task->id}}"  class="primary-btn mr-3">Update</button>
                            <button type="button" id="deleteButton" value="{{$task->id}}" class="btn-outline btn-outline--danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
