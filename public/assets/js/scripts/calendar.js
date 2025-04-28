	$(document).ready(function() {

		//Bootstrap Datetime Picker Minimum Setup
		$('#datetimepicker1').datetimepicker();

		//Bootstrap Datetime Picker Using Locales
        $('#datetimepicker2').datetimepicker({
            locale: 'ru'
        });

        //Bootstrap Datetime Picker Custom Formats
		$('#datetimepicker3').datetimepicker({
            format: 'LT'
        });

		//Bootstrap Datetime Picker View Mode
        $('#datetimepicker4').datetimepicker({
            viewMode: 'years'
        });

        //Date Custom
		$('#datecustom').bootstrapMaterialDatePicker({ weekStart : 0, time: false, locale: 'ru' });
		
		//Time Custom
		$('#timecustom').bootstrapMaterialDatePicker({ date: false });

		//Choosing Color FullCalendar
        $('body').on('click', '.eventColor > span', function(){
            $('.eventColor > span').removeClass('selected');
            $(this).addClass('selected');
        });

      
	});