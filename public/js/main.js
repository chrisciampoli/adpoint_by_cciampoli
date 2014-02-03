$(function() {
    
    var add_employee = String()
				+ '<section>'
					+ '<div id="redactor_tabs">'
						+ '<a href="#" class="redactor_tabs_act">upload</a>'
						+ '<a href="#">chose</a>'
						+ '<a href="#">link</a>'
					+ '</div>'
					+ '<div id="redactor-progress" class="redactor-progress redactor-progress-striped" style="display: none;">'
							+ '<div id="redactor-progress-bar" class="redactor-progress-bar" style="width: 100%;"></div>'
					+ '</div>'
					+ '<form id="redactorInsertImageForm" method="post" action="" enctype="multipart/form-data">'
						+ '<div id="redactor_tab1" class="redactor_tab">'
							+ '<input type="file" id="redactor_file" name="upload_thing" />'
						+ '</div>'
						+ '<div id="redactor_tab2" class="redactor_tab" style="display: none;">'
							+ '<div id="redactor_image_box"></div>'
						+ '</div>'
					+ '</form>'
					+ '<div id="redactor_tab3" class="redactor_tab" style="display: none;">'
						+ '<div class="image_modal_label"><label class="image_modal_label">Image URL:</label></div>'
						+ '<div class="image_modal_input"><input type="text" name="file_source" id="file_source" class="redactor_input"  /></div>'
					+ '</div>'
                                        + '<div>'
                                                + '<div class="image_modal_label"><label class="image_modal_label">Image List:</label></div>'
						+ '<div class="image_modal_input"><select name="image_list" id="image_list" class="redactor_input image_modal_input"></select></div>'
                                        + '</div>'
                                        + '<div>'
                                                + '<div class="image_modal_label"><label>Image Description:</label></div>'
						+ '<div class="image_modal_input"><input type="text" name="image_description" id="image_description" class="redactor_input"/></div>'
                                        + '</div>'
                                        + '<div>'
                                                + '<div class="image_modal_label"><label>Image Title:</label></div>'
						+ '<div class="image_modal_input"><input type="text" name="image_title" id="image_title" class="redactor_input"  /></div>'
                                        + '</div>'
                                        + '<div>'
                                                + '<div class="image_modal_label"><label>Image Link:</label></div>'
						+ '<div class="image_modal_input"><input type="text" name="image_link" id="image_link" class="redactor_input"  /></div>'
                                        + '</div>'
                                        + '<div>'
                                        + '<form id="preview">'
                                                + '<fieldset>'
                                                    + '<legend>Preview</legend>'
                                                    + '<div id="preview_box" class="preview" style="width:90% !important;overflow:auto;"></div>'
                                                + '</fieldset>'
                                             + '</form>'
                                        + '</div>'
				+ '</section>'
				+ '<footer>'
					+ '<button class="redactor_modal_btn redactor_btn_modal_close">Close</button>'
					+ '<input type="button" name="upload" class="redactor_modal_btn redactor_modal_action_btn" id="redactor_upload_btn" value="Save" />'
				+ '</footer>';
    
    
    $('#table_header').prepend('<input id="add_employee_btn" type="button" value="Add Employee" />');
    $('body').on('click', 'input#add_employee_btn', function(e) {
        var add_dialog = String()
                +'<div id="add_dialog"><div><label for="first_name">First Name</label></div>'
                +'<div><input type="text" name="first_name" id="first_name" /></div>';
                +'<div><label for="last_name">Last Name</label></div>'
                +'<div><input type="text" name="last_name" id="last_name" /></div></div>';
        $(add_employee).dialog({
            title: "Add Employee"
        });
    });
    $('#container').on('click', 'input#logout_btn', function(e) {
        e.preventDefault();
        $.post('http://54.193.89.75/swift_schedules/index.php/auth/logout').always(function() {
            window.location.replace("http://54.193.89.75/swift_schedules/index.php/auth/login");
        });
    });
});