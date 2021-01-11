<!-- Modal -->
<form action="{{ route('teacher.packages.update',['id'=>$package['id']]) }}" method="post">
    @csrf
    @method('put')
    <div class="modal fade" id="updatePackageModal" tabindex="-1" role="dialog" aria-labelledby="updatePackageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content checkout-widget common-design-form">
                <div class="modal-header">
                    <h5 class="modal-title" id="updatePackageModalLabel">Update Package</h5>
                    <button type="button" class="close w-auto" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Title *</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title of your Package" name="title" value="{{ $package['title'] }}">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Price *</label>
                        <input type="number" min="1" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="1" name="price"  value="{{ $package['price'] }}">
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="4" placeholder="Something more about your Package" name="description">{{ $package['description'] }}</textarea>
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