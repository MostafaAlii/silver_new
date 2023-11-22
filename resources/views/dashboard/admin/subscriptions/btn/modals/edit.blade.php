<div class="modal fade" id="edit{{ $subscription->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('general.edit') .' '. $subscription->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('subscriptions.update', $subscription->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Start Name -->
                    <div class="form-group">
                        <label for="name">{{ trans('agents.name') }}</label>
                        <input type="text" class="form-control" required name="name" id="name" value="{{$subscription->name}}">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- End Name -->

                    <div class="row">
                        <div class="col-6">
                            <label>Start Date :</label>
                            <input type="date" name="start_data" class="form-control" value="{{ $subscription->start_data }}">
                            @error('start_data')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label>End Date :</label>
                            <input type="date" name="end_data" class="form-control" value="{{ $subscription->start_data }}">
                            @error('end_data')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Start Phone -->
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" required name="price" id="price" value="{{$subscription->price}}">
                        @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- End Phone -->

                    <!-- Start Phone -->
                    <div class="form-group">
                        <label for="value">Subscription Value</label>
                        <input type="text" class="form-control" required name="value" id="value" value="{{$subscription->value}}">
                        @error('value')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- End Phone -->

                    <!-- Start Status Status -->
                    <div class="p-1 form-group">
                        <label for="status">Status</label>
                        <select name="status" class="p-1 form-control">
                            <option selected disabled>Select <span class="text-primary">{{$subscription->name}}</span>
                                Status...</option>
                            <option value="1" {{ (old('status', $subscription->status) == '1') ? 'selected' : '' }}>
                                {{ trans('general.active') }}
                            </option>
                            <option value="0" {{ (old('status', $subscription->status) == '0') ? 'selected' : ''
                                }}>
                                {{ trans('general.inactive') }}
                            </option>
                        </select>
                        @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- End Status Selected -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('general.close')
                            }}</button>
                        <button type="submit" class="btn btn-success">{{ trans('general.edit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>