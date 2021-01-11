<!-- The Modal -->
  <div class="modal" id="updateBookingModal">
    <div class="modal-dialog">
      <div class="modal-content" style="background-color: #2d3436;
background-image: linear-gradient(315deg, #2d3436 0%, #000000 74%);">
      
        <!-- Modal Header -->
        <div class="modal-header" style="display: flex; justify-content: space-between; margin: 5px 3px 5px;">
          <h4 class="modal-title mt-1" style="font-size: 15px;">Re-schedule</h4>
          <a href="" type="button" class="close" data-dismiss="modal" style="color: white;">&times;</a>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form action="{{ route('booking.update', [ 'id' => $book->id ]) }}" method="POST">
        @csrf
        @method('put')         
                <div class="form-group w-100">
                    <label for="card2">Choose Date For Session</label>
                    <input type="date" id="bookingdate" name="bookingdate" min="{{date('Y-m-d', strtotime('+1 day'))}}" value="{{$book->bookingdate}}" required>
                </div>

                <div class="form-group w-100">
                    <label for="card2">Choose Time For the Session</label>
                    <input type="time" id="bookingtime" name="bookingtime" value="{{$book->bookingtime}}" required>
                </div>

                <div class="form-group w-100">
                    <label for="card2">Session Duration(in Minutes)</label>
                    <input type="number" min="1" max="1" id="bookinghrs" name="bookinghrs" value="{{$book->bookinghrs}}" readonly required>
                </div>

                <div class="form-group">
                    <button type="submit" class="custom-button" id="complete-order" value="make payment">Update</button>
                </div>
        </form>
        Or,
          <button type="submit" class="custom-button" id="complete-order" value="make payment" style="margin-top: 15px;margin-bottom: 10px;" onclick="location.href = '{{ route('booking.cancel', [ 'id' => $book->id ]) }}'">Cancel Session</button>
          </div>
        </div>
        
        <!-- Modal footer
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>  -->
        
      </div>
    </div>
  </div>