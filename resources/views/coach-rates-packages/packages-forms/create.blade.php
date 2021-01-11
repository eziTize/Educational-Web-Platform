<!-- Modal -->
<form action="{{ route('teacher.packages.store') }}" method="post">
    @csrf
    @method('post')
    <div class="modal fade" id="createPackageModal" tabindex="-1" role="dialog" aria-labelledby="createPackageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content checkout-widget common-design-form">
                <div class="modal-header">
                    <h5 class="modal-title" id="createPackageModalLabel">Add a Package</h5>
                    <button type="button" class="close w-auto" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Title *</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title" name="title" value="{{ old('title') }}">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Price($)*</label>
                        <input oninput="myFunction(document.getElementById('price_4').value)" type="number" min="1" class="form-control @error('price') is-invalid @enderror" id="price_4" placeholder="1" name="price"  value="{{ old('price') }}">
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Fee To Recieve($)</label>
                        <input type="number" min="1" class="form-control" id="price_3" readonly value="{{ old('price') }}">
                    </div>
                    <script>
                        function myFunction(price) {
                            document.getElementById("price_3").value = price - (price/5);
                        }
                    </script>
                    <div class="form-group">
                        <label for="type">Package Type</label>
                        <select class="form-control-2 @error('type') is-invalid @enderror" type="text" placeholder="Private/Business" name="type" id="type" value="{{ old('type') }}">
                            <option value="dpack">Personal Development</option>
                            <option value="bpack">Business Package</option>
                        </select>
                        @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="freq_sess">Frequency of sessions</label>
                        <input type="text" class="form-control @error('freq_sess') is-invalid @enderror" id="freq_sess" placeholder="Frequency of sessions" name="freq_sess" value="{{ old('freq_sess') }}">
                        @error('freq_sess')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="4" placeholder="Something more about your Package" name="description">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Add</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>