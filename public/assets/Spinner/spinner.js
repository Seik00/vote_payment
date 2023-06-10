var Spinner = function ()
{
	var initSpinner = function ()
	{
		$("body").append('<div class="spinner"><h1 class="spinner_content"><i class="icon-spinner icon-spin orange bigger-125"></i></br><span class="spinner_text">Loading</span></h1></div>');
    }
    return
	{
        //main function to initiate the module
        init: function ()
		{
            initSpinner();
        }
    };
}();