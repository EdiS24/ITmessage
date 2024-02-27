<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title"><b>{{__('global.nmember')}}</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>

            
            <div class="modal-body">

                <div class="card-body text-left">

                    <form method="POST" action="{{ route('employees.store') }}" id="framework_form">
                        @csrf
                        <div class="form-group">
                            <label for="name">{{__('global.name')}}<i> { {{__('global.noSpace')}} }</i></label>
                            <input type="text" class="form-control" placeholder="Enter a Member name [hyphen accepted]" id="name" name="name"
                                required />
                        </div>
                        <div class="form-group">
                            <label for="position" class="col-sm-3 control-label">{{__('global.groups')}}</label>

                            <select multiple multiselect-search="true" multiselect-select-all="true" class="form-control" id="position" name="position[]" required>
                                @foreach($positions as $position)
                                <option value="{{$position->slug}}">{{$position->slug}}</option>
                                @endforeach

                            </select>

                        </div>

                        
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">{{__('global.login_email')}}</label>


                            <input type="email" class="form-control" id="email" name="email">

                        </div>
                        <div class="form-group">
                            <label for="birthday" class="col-sm-3 control-label">{{__('global.birthday')}}</label>
    
    
                            <input type="date" class="form-control" id="birthday" name="birthday">
    
                        </div>
                        <div class="form-group">
                            <label for="schedule" class="col-sm-3 control-label">{{__('global.notifications')}}</label>


                            <select multiple multiselect-search="true" multiselect-select-all="true" class="form-control" id="schedule" name="schedule[]" required>
                                @foreach($schedules as $schedule)
                                <option value="{{$schedule->slug}}">{{$schedule->slug}}</option>
                                @endforeach

                            </select>

                        </div>

                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-success waves-effect waves-light">
                                    {{__('global.submit')}}
                                </button>
                                <button type="reset" class="btn btn-danger waves-effect m-l-5" data-dismiss="modal">
                                    {{__('global.close')}}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>

    </div>
</div>
</div>
