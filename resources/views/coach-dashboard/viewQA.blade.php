<?php
  $qa = App\Models\StudentQA::where('user_id', $lt->student_id)->firstOrFail();
?>
<!-- The Modal -->
  <div class="modal" id="studentQAModal">
    <div class="modal-dialog">
      <div class="modal-content" style="background-color: #2d3436;
background-image: linear-gradient(315deg, #2d3436 0%, #000000 74%);">
      
        <!-- Modal Header -->
        <div class="modal-header" style="display: flex; justify-content: space-between; margin: 5px 3px 5px;">
          <h4 class="modal-title mt-1" style="font-size: 15px;">Student Q/A</h4>
          <a href="" type="button" class="close" data-dismiss="modal" style="color: white;">&times;</a>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-group">
              <label for="description">What would you like to have achieved by the end of this session?</label>
              <textarea class="form-control" id="ans_1" rows="2" name="description" readonly>{{strip_tags($qa->ans_1)}}</textarea>      
          </div>
          <div class="form-group">
              <label for="description">What’s missing in your life right now?</label>
              <textarea class="form-control" id="ans_2" rows="2" name="description" readonly>{{strip_tags($qa->ans_2)}}</textarea>      
          </div>
          <div class="form-group">
              <label for="description">What would you like more of in your life?</label>
              <textarea class="form-control" id="ans_3" rows="2" name="description" readonly>{{strip_tags($qa->ans_3)}}</textarea>      
          </div>
          <div class="form-group">
              <label for="description">What would you like less of?</label>
              <textarea class="form-control" id="ans_4" rows="2" name="description" readonly>{{strip_tags($qa->ans_4)}}</textarea>      
          </div>
          <div class="form-group">
              <label for="description">If you could change just ONE thing right now, what would it be?</label>
              <textarea class="form-control" id="ans_5" rows="2" name="description" readonly>{{strip_tags($qa->ans_5)}}</textarea>      
          </div>
          <div class="form-group">
              <label for="description">How specifically will you know you’ve completed that action/goal?</label>
              <textarea class="form-control" id="ans_6" rows="2" name="description" readonly>{{strip_tags($qa->ans_6)}}</textarea>      
          </div>
          <div class="form-group">
              <label for="description">What do you NOT want the coach to ask you?</label>
              <textarea class="form-control" id="ans_7" rows="2" name="description" readonly>{{strip_tags($qa->ans_7)}}</textarea>      
          </div>
          <div class="form-group">
              <label for="description">What’s wrong with how you are right now?</label>
              <textarea class="form-control" id="ans_8" rows="2" name="description" readonly>{{strip_tags($qa->ans_8)}}</textarea>      
          </div>
          <div class="form-group">
              <label for="description">Where are you already awesome?</label>
              <textarea class="form-control" id="ans_9" rows="2" name="description" readonly>{{strip_tags($qa->ans_9)}}</textarea>      
          </div>
        </div>
        
        <!-- Modal footer
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>  -->
        
      </div>
    </div>
  </div>