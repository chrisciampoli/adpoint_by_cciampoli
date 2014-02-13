<div class="container-fluid">
        <div><h2 class="sub-header" style="display: inline">Employees</h2><input type="button" value="Add employee" class="btn btn-success" style="display: inline-block;float: right;padding: 5px;margin-top:5px;"/></div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Position</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Availability</th>
                  <th>Controls</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Manager</td>
                  <td>Christopher Ciampoli</td>
                  <td>(619) 403-2134</td>
                  <td>chrisciampoli@gmail.com</td>
                  <td>
                      <button type="button" rel="1" class="check_avail btn btn-primary btn-sm">
                          <div class="datepicker" id="datepicker_1" rel="1"></div>
                          <span class="glyphicon glyphicon-calendar"></span> Check
                      </button>
                  </td>
                  <td>
                      <button type="button" class="btn btn-primary btn-sm">
                          <span class="glyphicon glyphicon-pencil"></span> Edit
                      </button>
                      <button type="button" class="btn btn-danger btn-sm">
                          <span class="glyphicon glyphicon-remove"></span> Remove
                      </button>
                  </td>
                </tr>
                <tr id="avail_1" style="display:none;" class="alert alert-info">
                    <td>
                        <div class="row">
                            <div class="span2">Monday</div>
                            <div class="span2">Tuesday</div>
                            <div class="span2">Wednesday</div>
                            <div class="span2">Thursday</div>
                            <div class="span2">Friday</div>
                            <div class="span2">Saturday | Sunday</div>  
                        </div>
                    </td>
                </tr>
                <tr>
                  <td>Shift Manager</td>
                  <td>Edward Burdeno</td>
                  <td>(423) 234-2321</td>
                  <td>eburdeno@quicknco.com</td>
                  <td>
                      <button type="button"  rel="2" class="check_avail btn btn-primary btn-sm">
                          <div class="datepicker" id="datepicker_2"></div>
                          <span class="glyphicon glyphicon-calendar"></span> Check
                      </button>
                  </td>
                  <td>
                      <button type="button" class="btn btn-primary btn-sm">
                          <span class="glyphicon glyphicon-pencil"></span> Edit
                      </button>
                      <button type="button" class="btn btn-danger btn-sm">
                          <span class="glyphicon glyphicon-remove"></span> Remove
                      </button>
                  </td>
                </tr>
                <tr id="avail_2" style="display:none;" class="alert alert-info">
                    <td>
                        <div class="row">
                            <div class="col-xs-6 col-md-3">
                                <a href="#">
                                    <img alt="Monday" data-src="holder.js/100%x75" style="height: 75px; width: 100%; display: block;" src="data:image/png;base64,iVBORw0K…Pc53zu9+xgsAAAAABJRU5ErkJggg==" />
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                  <td>Barista</td>
                  <td>Kim Evans</td>
                  <td>(342) 443-3211</td>
                  <td>kevans@starbucks.com</td>
                  <td>
                      <button type="button" rel="3" class="check_avail btn btn-primary btn-sm">
                          <div class="datepicker" id="datepicker_3"></div>
                          <span class="glyphicon glyphicon-calendar"></span> Check
                      </button>
                  </td>
                  <td>
                      <button type="button" class="btn btn-primary btn-sm">
                          <span class="glyphicon glyphicon-pencil"></span> Edit
                      </button>
                      <button type="button" class="btn btn-danger btn-sm">
                          <span class="glyphicon glyphicon-remove"></span> Remove
                      </button>
                  </td>
                </tr>
                <tr id="avail_3" style="display:none;" class="alert alert-info">
                    <td>
                        <div class="row">
                            <div class="col-xs-6 col-md-3">
                                <a href="#">
                                    <img alt="Monday" data-src="holder.js/100%x75" style="height: 75px; width: 100%; display: block;" src="data:image/png;base64,iVBORw0K…Pc53zu9+xgsAAAAABJRU5ErkJggg==" />
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                  <td>Cashier</td>
                  <td>Steve Howits</td>
                  <td>(342) 445-3551</td>
                  <td>showits@starbucks.com</td>
                  <td>
                      <button type="button" rel="4" class="check_avail btn btn-primary btn-sm">
                          <div class="datepicker" id="datepicker_4"></div>
                          <span class="glyphicon glyphicon-calendar"></span> Check
                      </button>
                  </td>
                  <td>
                      <button type="button" class="btn btn-primary btn-sm">
                          <span class="glyphicon glyphicon-pencil"></span> Edit
                      </button>
                      <button type="button" class="btn btn-danger btn-sm">
                          <span class="glyphicon glyphicon-remove"></span> Remove
                      </button>
                  </td>
                </tr>
                <tr id="avail_4" style="display:none;" class="alert alert-info">
                    <td>
                        <div class="row">
                            <div class="col-xs-6 col-md-3">
                                <a href="#">
                                    <img alt="Monday" data-src="holder.js/100%x75" style="height: 75px; width: 100%; display: block;" src="data:image/png;base64,iVBORw0K…Pc53zu9+xgsAAAAABJRU5ErkJggg==" />
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div id="create_employee_dialig">
        
    </div>
