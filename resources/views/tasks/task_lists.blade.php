@foreach ($tasks as $task)
    @if ($task->cstatus == 0 && $task->imstatus == 0)
    <li class="main__content__list__item">
        <span><button type="button" style="background: none" id="importantButton" value="{{$task->id}}"><i class="fa-regular fa-star task-checkbox mt-2" style="border:1px solid "></i></button></span>
        <div class="main__content__list__item__wrapper d-lg-flex justify-content-between" data-toggle="modal" data-target="#updateTaskModal{{$task->id}}">
            <div class="main__content__list__item__content d-flex align-items-center">
                {{-- <label for="main__content__list__item-1" class="task-checkbox-label mb-0"></label> --}}
                <h4 class="main__content__list__item__content__title mb-0">{{$task->title}}</h4>
            </div>
            <div class="main__content__list__item__actions d-flex flex-wrap align-items-center">
                <ul class="main__content__list__item__actions__list d-flex flex-wrap align-items-center mr-auto mr-lg-3">
                @foreach ($task->getTag as $tag)
                        <li>
                            <span style="color: {{$tag->getTagName->color}}" class="badge ">{{$tag->getTagName->name}}</span>
                        </li>
                @endforeach

                </ul>
                <small class="main__content__list__item__actions__time text-muted mr-3">{{$task->dueDate}}</small>
                <div class="main__content__list__item__actions__avatar-group d-flex flex-shrink-0">
                @foreach ($task->getUser as $user)
                        <a href="#!" class="main__content__list__item__actions__avatar__item rounded-circle overflow-hidden" data-toggle="tooltip" data-placement="top" data-original-title="{{$user->getUserName->name}}">
                            <img src="{{asset('frontend')}}./assets/images/avatars/avatar-s-3.jpg" alt="avatar" class="main__content__list__item__actions__avatar__image w-100 h-100">
                        </a>
                @endforeach
                </div>
            </div>
        </div>
    </li>
    @endif

    {{-- <!-- Update Task Modal -->
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
    <!-- End Update Task Modal --> --}}
@endforeach
