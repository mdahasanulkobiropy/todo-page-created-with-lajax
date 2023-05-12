<!DOCTYPE html>

@foreach ($theams as $theam )
    @if ($theam->theam==1)
        <html class="dark-layout" lang="en">
    @endif
@endforeach
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Site Title -->
	<title>Todo Page</title>
	<!-- All CSS -->
	<link rel="stylesheet" href="{{asset('frontend')}}./assets/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{asset('frontend')}}./assets/plugins/flatpickr/css/flatpickr.min.css">
	<link rel="stylesheet" href="{{asset('frontend')}}./assets/plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="{{asset('frontend')}}./assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css">
	<link rel="stylesheet" href="{{asset('frontend')}}./assets/css/style.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    @foreach ($theams as $theam)
        @if ($theam->theam == 0)
            <button type="button" id="theambuttoncolor" value="{{$theam->id}}"  class="theme-toggler d-inline-flex align-items-center position-fixed border-0">
                <i data-feather="circle" class="mr-2"></i>
                Toggle Theme
            </button>
        @elseif ($theam->theam == 1)
            <button type="button" id="theambutton" value="{{$theam->id}}" class="theme-toggler d-inline-flex align-items-center position-fixed border-0">
                <i data-feather="circle" class="mr-2"></i>
                Toggle Theme
            </button>
        @endif
    @endforeach


    <input type="text" class="form-control" id="new"/>
	<!-- Start Page Main Contents Section -->
	<main class="main py-5 my-5">
		<div class="main__container w-100 mx-auto">
            <div id="tagSuccessResponse" class="text-center">

            </div>
            <div id="taskSuccessResponse" class="text-center">

            </div>
			<div class="row">
				<div class="col-12">
					<div class="main__wrapper d-flex position-relative overflow-hidden">
						<div class="main__aside--closer"></div>
						<aside class="main__aside">
							<div class="main__aside__header">
								<button type="button" id="addTaskButton" class="primary-btn w-100" data-toggle="modal" data-target="#addTaskModal">Add Task</button>
							</div>
							<div class="main__aside__body custom-scrollbar">
								<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
									<a class="nav-link d-inline-flex align-items-center active" id="v-pills-aside-tab-1" data-toggle="pill" href="#v-pills-asideTab-1" role="tab" aria-controls="v-pills-asideTab-1" aria-selected="true">
										<i data-feather="mail" class="nav-link__icon"></i>
										<span class="nav-link__text d-inline-block">My Task</span>
									</a>
									<a class="nav-link d-inline-flex align-items-center" id="v-pills-aside-tab-2" data-toggle="pill" href="#v-pills-asideTab-2" role="tab" aria-controls="v-pills-asideTab-2" aria-selected="false">
										<i data-feather="star" class="nav-link__icon"></i>
										<span class="nav-link__text d-inline-block">Important</span>
									</a>
									<a class="nav-link d-inline-flex align-items-center" id="v-pills-aside-tab-3" data-toggle="pill" href="#v-pills-asideTab-3" role="tab" aria-controls="v-pills-asideTab-3" aria-selected="false">
										<i data-feather="check" class="nav-link__icon"></i>
										<span class="nav-link__text d-inline-block">Completed</span>
									</a>
									<a class="nav-link d-inline-flex align-items-center" id="v-pills-aside-tab-4" data-toggle="pill" href="#v-pills-asideTab-4" role="tab" aria-controls="v-pills-asideTab-4" aria-selected="false">
										<i data-feather="trash" class="nav-link__icon"></i>
										<span class="nav-link__text d-inline-block">Deleted</span>
									</a>
								</div>
								<div class="main__aside__body__tags-card mt-5">
									<div class="main__aside__body__tags-card__header d-flex align-items-center justify-content-between mb-2">
										<h4 class="main__aside__body__tags-card__header__title text-muted text-uppercase mb-0">Tags</h4>
										<button data-toggle="modal" data-target="#addTagsModal" class="main__aside__body__tags-card__header__add-btn btn d-inline-flex align-items-center shadow-none bg-transparent border-0">
											<i data-feather="plus"></i>
										</button>
									</div>
									<ul id="tagrenderId" class="main__aside__body__tags-card__list">
										@include('tags.tag_lists')
									</ul>
								</div>
							</div>
						</aside>
						<div class="main__content w-100">
							<div class="main__content__header d-flex">
								<button type="button" class="main__aside__toggler bg-transparent border-0">
									<i data-feather="menu"></i>
								</button>
								<form action="javascript:void(0)" class="main__content__search-form d-flex flex-row-reverse w-100">
									<input type="search" id="task-search-control" class="main__content__search-form__control w-100 bg-transparent border-0 pl-0" placeholder="Search Task">
									<button type="submit" class="main__content__search-form__btn d-inline-flex align-items-center justify-content-center text-muted bg-transparent border-0">
										<i data-feather="search"></i>
									</button>
								</form>
								<div class="dropdown custom-dropdown">
									<button class="btn dropdown-toggle bg-transparent border-0 shadow-none" type="button" id="mainContentDropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i data-feather="more-vertical"></i>
									</button>
									<ul class="dropdown-menu border-0 mt-0" aria-labelledby="mainContentDropdownMenuButton">
										<li class="dropdown-item bg-transparent p-0">
											<button type="button" id="sortA-Z" class="dropdown-link w-100 text-left border-0">Sort  A - Z</button>
										</li>
										<li class="dropdown-item bg-transparent p-0">
											<button type="button" id="sortZ-A" class="dropdown-link w-100 text-left border-0">Sort  Z - A</button>
										</li>
									</ul>
								</div>
							</div>
							<div class="main__content__body custom-scrollbar overflow-hidden">
								<div class="tab-content" id="v-pills-tabContent">
									<div class="tab-pane fade show active" id="v-pills-asideTab-1" role="tabpanel" aria-labelledby="v-pills-aside-tab-1">
										<ul class="main__content__list mb-0" id="taskpartrenderId">
											@include('tasks.task_lists')
										</ul>
										<div class="main__content__no-results">
											<h5 class="main__content__no-results__text text-center mb-0">No Items Found</h5>
										</div>
									</div>
									<div class="tab-pane fade" id="v-pills-asideTab-2" role="tabpanel" aria-labelledby="v-pills-aside-tab-2">
                                        {{--important part--}}
                                        <ul class="main__content__list mb-0">
                                            @foreach ($tasks as $task)
                                                @if ($task->imstatus == 1)
                                                    <li class="main__content__list__item">
                                                        <span><button type="button" value="{{$task->id}}" id="unimportantButton"><i style="color: yellow" class="fa-regular fa-star task-checkbox mt-2" style="border:1px solid "></i></button></span>
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
                                            @endforeach
                                        </ul>
                                    </div>

                                    {{--complete part--}}
									<div class="tab-pane fade" id="v-pills-asideTab-3" role="tabpanel" aria-labelledby="v-pills-aside-tab-3">
                                        <ul class="main__content__list mb-0">
                                            @foreach ($tasks as $task)
                                                @if ($task->cstatus == 1)
                                                    <li class="main__content__list__item">
                                                        <div class="main__content__list__item__wrapper d-lg-flex justify-content-between" data-toggle="modal" data-target="#updateTaskModal">
                                                            <div class="main__content__list__item__content d-flex align-items-center">
                                                                <label for="main__content__list__item-3" class="mb-0"></label>
                                                                <h4 class="main__content__list__item__content__title mb-0">{{$task->title}}</h4>
                                                            </div>
                                                            <div class="main__content__list__item__actions d-flex flex-wrap align-items-center">
                                                                <ul class="main__content__list__item__actions__list d-flex flex-wrap align-items-center mr-auto mr-lg-3">
                                                                @foreach ($task->getTag as $tag)
                                                                        <li>
                                                                        <span style="color:{{$tag->getTagName->color}}" class="badge">{{$tag->getTagName->name}}</span>
                                                                        </li>
                                                                @endforeach

                                                                </ul>
                                                                <small class="main__content__list__item__actions__time text-muted mr-3">{{$task->dueDate}}</small>
                                                                <div class="main__content__list__item__actions__avatar-group d-flex flex-shrink-0">
                                                                    <!--  -->
                                                                    @foreach ($task->getUser as $user)
                                                                        <a href="#!" class="main__content__list__item__actions__avatar__item rounded-circle overflow-hidden" data-toggle="tooltip" data-placement="top" data-original-title="{{$user->getUserName->name}}">
                                                                            <img src="{{asset('frontend')}}./assets/images/avatars/avatar-s-3.jpg" alt="avatar" class="main__content__list__item__actions__avatar__image w-100 h-100">
                                                                        </a>
                                                                    @endforeach
                                                                    <span class="ml-5"><button id="incompleteStatusButton" value="{{$task->id}}" class="btn btn-success">Incomplete</button></span>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>

                                    {{-- delete show part --}}
									<div class="tab-pane fade" id="v-pills-asideTab-4" role="tabpanel" aria-labelledby="v-pills-aside-tab-4">
                                        <ul class="main__content__list mb-0">
                                            @foreach ($trashs as $trash)
                                                 <li class="main__content__list__item">
                                                     <div class="main__content__list__item__wrapper d-lg-flex justify-content-between" data-toggle="modal" data-target="#updateTaskModal">
                                                         <div class="main__content__list__item__content d-flex align-items-center">
                                                             <label for="main__content__list__item-3" class="mb-0"></label>
                                                             <h4 class="main__content__list__item__content__title mb-0">{{$trash->title}}</h4>
                                                         </div>
                                                         <div class="main__content__list__item__actions d-flex flex-wrap align-items-center">
                                                             <ul class="main__content__list__item__actions__list d-flex flex-wrap align-items-center mr-auto mr-lg-3">
                                                                @foreach ($trash->getTag as $tag)
                                                                     <li>
                                                                     <span style="color:{{$tag->getTagName->color}}" class="badge">{{$tag->getTagName->name}}</span>
                                                                     </li>
                                                                @endforeach

                                                             </ul>
                                                             <small class="main__content__list__item__actions__time text-muted mr-3">{{$task->dueDate}}</small>
                                                             <div class="main__content__list__item__actions__avatar-group d-flex flex-shrink-0">
                                                                 <!--  -->
                                                                 @foreach ($trash->getUser as $user)
                                                                     <a href="#!" class="main__content__list__item__actions__avatar__item rounded-circle overflow-hidden" data-toggle="tooltip" data-placement="top" data-original-title="{{$user->getUserName->name}}">
                                                                         <img src="{{asset('frontend')}}./assets/images/avatars/avatar-s-3.jpg" alt="avatar" class="main__content__list__item__actions__avatar__image w-100 h-100">
                                                                     </a>
                                                                 @endforeach
                                                                 <span class="ml-5"><button id="restoreId" value="{{$trash->id}}" class="btn btn-success">Restore</button></span>
                                                                 <span class="ml-3"><button id="forcedeleteId" value="{{$trash->id}}" class="btn btn-danger">Delete</button></span>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </li>
                                            @endforeach
                                        </ul>
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<!-- End Page Main Contents Section -->

    <!-- Update Task Modal -->
        @include('tasks.task_update')
    <!-- End Update Task Modal -->

	<!-- Add Task Modal -->
	<div class="modal task-modal fade" id="addTaskModal" aria-labelledby="addTaskModalLabel" aria-hidden="true">
		<div class="modal-dialog m-0 w-100 h-100 position-fixed">
			<div class="modal-content border-0 rounded-0 h-100">
				<div class="modal-header align-items-center border-0 rounded-0">
					<h3 class="modal-header__title mb-0">Add Task</h3>
					<button type="button" class="close shadow-none" data-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<div class="modal-body custom-scrollbar">
					<form id="addTaskForm" action="{{route('store.task')}}" method="POST" enctype="multipart/form-data" class="task-modal__form needs-validation" novalidate>
						<div class="form-group">
							<label for="title" class="form-group-label">Title</label>
							<input type="text" id="addtitle" name="title" class="form-control bg-transparent" placeholder="Title">

						</div>
						<div id="titleErorr" class=" text-danger">
                        </div>
						<div class="form-group">
							<label for="task-assigned--add" class="form-group-label d-block">Assignee</label>
							<select id="adduser_id" name="user_id[]" class="custom-select form-control bg-transparent task-assigned" data-placeholder="Assignee Name" multiple="multiple">

                                {{-- user input for task --}}
								@foreach ($users as $user)

                                    <option data-img="{{asset('frontend')}}./assets/images/avatars/avatar-s-1.jpg" value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach

							</select>
						</div>
                        <div id="user_idErorr" class=" text-danger">
                        </div>
						<div class="form-group">
							<label for="dueDate" class="form-group-label">Due Date</label>
							<input type="date" id="adddueDate" min="{{now()->addDay()}}" name="dueDate" class="  form-control bg-transparent" placeholder="Due Date">
						</div>
                        <div id="dueDateErorr" class=" text-danger">
                        </div>
						<div class="form-group">
							<label for="task-tags--add" class="form-group-label d-block">Tags</label>
							<select id="addtag_id" name="tag_id[]" class="custom-select form-control bg-transparent task-tags" data-placeholder="Add Tags" multiple="multiple">

                                {{-- Tag input for task --}}
								@foreach ($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach

							</select>
						</div>
                        <div id="tag_idErorr" class=" text-danger">
                        </div>
						<div class="form-group">
							<label for="description" class="form-group-label">Description</label>
							<textarea name="description" id="adddescription" class="form-control form-control--textarea bg-transparent" placeholder="Write Your Description"></textarea>
						</div>
                        <div id="descriptionErorr" class=" text-danger">
                        </div>
						<div>
							<button type="button" id="addStoreTaskButton" class="primary-btn mr-3">Add</button>
							<button type="button" class="btn-outline btn-outline--danger" data-dismiss="modal">Cancel</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End Add Task Modal -->

	<!-- Add Tags Modal -->
	<div class="modal task-modal fade" id="addTagsModal" aria-labelledby="addTagsModalLabel" aria-hidden="true">
		<div class="modal-dialog m-0 w-100 h-100 position-fixed">
			<div class="modal-content border-0 rounded-0 h-100">
				<div class="modal-header align-items-center border-0 rounded-0">
					<h3 class="modal-header__title mb-0">Add Tags</h3>
					<button type="button" class="close shadow-none" data-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<div class="modal-body custom-scrollbar">
					<form  class="task-modal__form needs-validation">
						<div class="form-group">
							<label for="addTag" class="form-group-label">Tag Name</label>
							<input type="text" id="addTag" name="name" class="form-control bg-transparent" placeholder="Tag Name">
						</div>
                        <div id="tagErorr" class=" text-danger">
                        </div>

						<div class="form-group">
							<label for="addColor" class="form-group-label">Tag Color</label>
							<input type="color" id="addColor" name="color" class="form-control bg-transparent" placeholder="Tag Color" >
						</div>
						<div>
							<button type="button" id="addTagButton" class="primary-btn mr-3">Add</button>
							<button type="button" class="btn-outline btn-outline--danger" data-dismiss="modal">Cancel</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End Tags Task Modal -->


	<!-- All Scripts -->
	<script src="{{asset('frontend')}}./assets/js/jquery-1.12.4.min.js"></script>
	<script src="{{asset('frontend')}}./assets/plugins/bootstrap/js/popper.min.js"></script>
	<script src="{{asset('frontend')}}./assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="{{asset('frontend')}}./assets/plugins/feather/js/feather.min.js"></script>
	<script src="{{asset('frontend')}}./assets/plugins/flatpickr/js/flatpickr.js"></script>
	<script src="{{asset('frontend')}}./assets/plugins/select2/js/select2.min.js"></script>
	<script src="{{asset('frontend')}}./assets/plugins/perfect-scrollbar/js/perfect-scrollbar.min.js"></script>
	<script src="{{asset('frontend')}}./assets/js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script>
        $(document).ready(function(){
            // alert("ok");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //this Part for Tag store
            $(document).on('click', '#addTagButton', function(){

                // alert("ok");
                var name   = $("#addTag").val();
                var color  = $("#addColor").val();
                // alert(color);
                $.ajax({
                    url: '/addtag',
                    type: 'POST',
                    data:{
                        name   : name,
                        color  : color,
                    },
                    success:function(res){
                        // alert(res.test);
                       $("#tagErorr").html(res.name).delay(2000).fadeOut(400);
                       $("#addTag").val('');

                       if(res.success){
                          $("#tagSuccessResponse").html(res.success).delay(2000).fadeOut(400);
                          $("#addTagsModal").modal('hide');
                          $('#tagrenderId').html(res.alltag);

                        }
                    }

                });
            });


            //this Part for task store
            $(document).on('click', '#addStoreTaskButton', function(){
                // alert('ok');


                var title       = $('#addtitle').val();
                var user_id     = $('#adduser_id').val();
                var dueDate     = $('#adddueDate').val();
                var tag_id      = $('#addtag_id').val();
                var description = $('#adddescription').val();

                $.ajax({
                    url: '/addtask',
                    type: 'POST',
                    data: {
                        title       : title,
                        user_id     : user_id,
                        dueDate     : dueDate,
                        tag_id      : tag_id,
                        description : description
                    },

                    success:function(res){

                    $('#titleErorr').html(res.titleError).delay(2000).fadeOut(400);
                    $('#user_idErorr').html(res.user_idError).delay(2000).fadeOut(400);
                    $('#dueDateErorr').html(res.dueDateError).delay(2000).fadeOut(400);
                    $('#tag_idErorr').html(res.tag_idError).delay(2000).fadeOut(400);
                    $('#descriptionErorr').html(res.descriptionError).delay(2000).fadeOut(400);
                    if(res.success){
                        alert(res.success);

                        // $('#taskSuccessResponse').html(res.success);
                        $('#addTaskModal').modal('hide');
                        // location.reload();

                        $("#taskpartrenderId").html(res.alltask);
                    }

                    }

                });

            });


            $(document).on('click', '#updateButtonId', function(){
                // alert('ok');
                var id = $(this).val();
                var title = $('#updatetitle'+id).val();
                //  alert(title);
                var user_id = $('.updateuser_id'+id).val();
                //  alert(user_id);
                var dueDate = $('#updatedueDate'+id).val();
                //  alert(dueDate);
                var tag_id = $('.updatetag_id'+id).val();
                //  alert(tag_id);
                var description = $('#updatedescription'+id).val();
                //  alert(description);

                // var id = $(this).val();
                // alert(id);

                $.ajax({
                    url: '/taskupdate/'+id,
                    type: 'POST',
                    data: {
                        title       : title,
                        user_id     : user_id,
                        dueDate     : dueDate,
                        tag_id      : tag_id,
                        description : description
                    },

                    success:function(res){

                    $('#updatetitleErorr').html(res.titleError).delay(2000).fadeOut(400);
                    $('#updateuser_idErorr').html(res.user_idError).delay(2000).fadeOut(400);
                    $('#updatedueDateErorr').html(res.dueDateError).delay(2000).fadeOut(400);
                    $('#updatetag_idErorr').html(res.tag_idError).delay(2000).fadeOut(400);
                    $('#updatedescriptionErorr').html(res.descriptionError).delay(2000).fadeOut(400);
                    if(res.success){
                        alert(res.success);
                        alert(id);
                        $('#updateTaskModal'+id).modal('hide');
                        $('#taskpartrenderId').html(res.alltask);



                    }

                    }

                });

            });

            //task softdelete
            $(document).on('click', '#deleteButton', function(){
                var id = $(this).val();

                $.ajax({
                    url  : '/taskdelete/'+id,
                    type : 'GET',
                    success:function(res){
                        // alert(res.success);
                        location.reload();
                    }

                });

            })

            //task forcedelete
            $(document).on('click', '#forcedeleteId', function(){
                var id = $(this).val();
                // alert(id);

                $.ajax({
                    url  : '/taskforcedelete/'+id,
                    type : 'GET',
                    success:function(res){
                        // alert(res.success);
                        location.reload();
                    }

                });

            })

            //restore

            $(document).on('click', '#restoreId', function(){
                var id = $(this).val();
                // alert(id);

                $.ajax({
                    url  : '/taskrestore/'+id,
                    type : 'GET',
                    success:function(res){
                        // alert(res.success);
                        location.reload();
                    }

                });

            })

            $(document).on('click', '#completeStatusButton', function(){
                var id = $(this).val();
                // alert(id);

                $.ajax({

                    url: '/taskcomplete/'+id,
                    type: 'GET',
                    success:function(res){
                        alert(res.success);
                        location.reload();
                    }
                });
            })

            $(document).on('click', '#incompleteStatusButton', function(){
                var id = $(this).val();
                // alert(id);

                $.ajax({

                    url: '/taskincomplete/'+id,
                    type: 'GET',
                    success:function(res){
                        alert(res.success);
                        location.reload();
                    }
                });
            })

            //important part
            $(document).on('click', '#importantButton', function(){
                var id = $(this).val();
                // alert(id);

                $.ajax({

                    url: '/taskimportant/'+id,
                    type: 'GET',
                    success:function(res){
                        alert(res.success);
                        location.reload();
                    }
                });
            })


            //unimportant part
            $(document).on('click', '#unimportantButton', function(){
                var id = $(this).val();
                // alert(id);

                $.ajax({

                    url: '/taskunimportant/'+id,
                    type: 'GET',
                    success:function(res){
                        alert(res.success);
                        location.reload();
                    }
                });
            })

            //theam part color
            $(document).on('click', '#theambuttoncolor', function(){

                // alert("ok");
                var id = $(this).val();
                // alert(id);

                $.ajax({

                    url: '/theamcolor/'+id,
                    type: 'GET',
                    success:function(res){
                        alert(res.success);
                        location.reload();
                    }
                });
            })
            //theam part color
            $(document).on('click', '#theambutton', function(){

                // alert("ok");
                var id = $(this).val();
                // alert(id);

                $.ajax({

                    url: '/theam/'+id,
                    type: 'GET',
                    success:function(res){
                        alert(res.success);
                        location.reload();
                    }
                });
            })
        });
    </script>
</body>
</html>
