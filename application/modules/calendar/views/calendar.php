<?php echo $page_title ?>

<div id="calendar" style="width: 900px; margin: 40px auto;"></div>

<div class="modal fade" id="create_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form class="form-horizontal" method="POST" action="POST" id="form_create">
				<input type="hidden" name="calendar_id" value="0">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Create New Event</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
				</div>
				<div class="modal-body">

					<div class="form-group">
						<div class="alert alert-danger" style="display: none;"></div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Title  <span class="required"> * </span></label>
						<div class="col-sm-10">
							<input type="text" name="title" class="form-control" placeholder="Title" required>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2">Description</label>
						<div class="col-sm-10">
							<textarea name="desc" rows="3" class="form-control" placeholder="Enter description" required></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="color" class="col-sm-2 control-label">Color</label>
						<div class="col-sm-10">
							<select name="color" class="form-control">
								<option value="">Choose</option>
								<option style="color:#3F51B5;" value="#3F51B5">&#9724; Indigo</option>
								<option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
								<option style="color:#009688;" value="#009688">&#9724; Teal</option>                       
								<option style="color:#FFEB3B;" value="#FFEB3B">&#9724; Yellow</option>
								<option style="color:#FF9800;" value="#FF9800">&#9724; Orange</option>
								<option style="color:#F44336;" value="#F44336">&#9724; Red</option>
								<option style="color:#000;" value="#000">&#9724; Black</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-4">Start Date</label>
						<div class="col-sm-10">
							<input id="datetimepicker1" type="text" class="form-control" name="start" />
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-4">End Date</label>
						<div class="col-sm-10">
							<input id="datetimepicker2" type="text" class="form-control" name="end"/>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<a href="javascript::void" class="btn default" data-dismiss="modal">Cancel</a>
					<a class="btn btn-danger delete_calendar" style="display: none;">Delete</a>
					<button class="btn green">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>