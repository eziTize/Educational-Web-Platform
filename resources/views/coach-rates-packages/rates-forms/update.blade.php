<!-- Modal -->
<form action="{{ route('teacher.service.update',['id'=>$service['id']]) }}" method="post">
    @csrf
    @method('put')
    <div class="modal fade" id="updateRateModal" tabindex="-1" role="dialog" aria-labelledby="updateRateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content checkout-widget common-design-form">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateRateModalLabel">Update Details</h5>
                    <button type="button" class="close w-auto" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Title *</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title of your Package" name="title" value="{{ $service['title'] }}">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    @if($service['type'] != 'rates')
                    <div class="form-group">
                        <label for="price">Price($)*</label>
                        <input oninput="myFunction_1(document.getElementById('price_8').value)" type="number" min="1" class="form-control @error('price') is-invalid @enderror" id="price_8" placeholder="1" name="price"  value="{{ $service['price'] }}">
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Fee To Recieve($)</label>
                        <input type="number" min="1" class="form-control" id="price_7" value="{{ $service['price']  - $service['price']/5 }}" readonly>
                    </div>
                    <script>
                        function myFunction_1(price) {
                            document.getElementById("price_7").value = price - (price/5);
                        }
                    </script>
                    @else
                    <div class="form-group">
                        <label for="price">Price(*$/hour)</label>
                        <input oninput="myFunction_2(document.getElementById('price_6').value)" type="number" min="1" class="form-control @error('price') is-invalid @enderror" id="price_6" placeholder="1" name="price"  value="{{ $service['price'] }}">
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Fee To Recieve($/hour)</label>
                        <input type="number" min="1" class="form-control" id="price_5" value="{{ $service['price'] - $service['price']/5 }}" readonly>
                    </div>
                    <script>
                        function myFunction_2(price) {
                            document.getElementById("price_5").value = price - (price/5);
                        }
                    </script>
                    @endif
                    @if($service['type'] != 'rates')
                    <div class="form-group">
                        <label for="type">Package Type</label>
                        <select class="form-control-2 @error('type') is-invalid @enderror" type="text" placeholder="Private/Business" name="type" id="type" value="{{ $service['type'] }}">
                            <option value="dpack">Personal Development</option>
                            <option value="bpack">Business Package</option>
                        </select>
                        @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    @else
                    <input style="display: none;" type="text" class="form-control" name="type"  value="{{ $service['type'] }}">
                    @endif
                    @if($service['type'] != 'rates')
                    <div class="form-group">
                        <label for="freq_sess">Frequency of sessions</label>
                        <input type="text" class="form-control @error('freq_sess') is-invalid @enderror" id="freq_sess" placeholder="Frequency of sessions" name="freq_sess" value="{{ $service['freq_sess'] }}">
                        @error('freq_sess')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="4" placeholder="Something more about your Package" name="description">{{ $service['description'] }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>