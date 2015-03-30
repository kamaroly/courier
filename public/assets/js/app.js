$(document).ready(function()
{
    /**
     * FROM CITY AND AREA SELECTION
     */
    $.get('/api/cities', function(data)
    {
       $.each(data, function(cityId, cityName)
        {
           $('select#FromcityDropdown').append('<option value="'+cityId+'">'+cityName+'</option>');
        });
    });

   $('select#FromcityDropdown').change(function()
   {
        var countryId = $(this).val();
    
        $.get('/api/cities/'+countryId, function(data)
        {
            $('select#FromareasDropdown').html('<option value="0">Select Area</option>');

            $.each(data, function(areaId, areaName){
                $('select#FromareasDropdown').append('<option value="'+areaId+'">'+areaName+'</option>')
            });
        }, 'json');
    });

    /**
     * TO CITY AND AREA SELECTION
     */
    $.get('/api/cities', function(data)
    {
       $.each(data, function(cityId, cityName)
        {
           $('select#TocityDropdown').append('<option value="'+cityId+'">'+cityName+'</option>');
        });
    });

   $('select#TocityDropdown').change(function()
   {
        var countryId = $(this).val();

         $('select#ToareasDropdown').html('<option value="0">Select Area</option>');

        $.get('/api/cities/'+countryId, function(data)
        {
            $.each(data, function(areaId, areaName){
                $('select#ToareasDropdown').append('<option value="'+areaId+'">'+areaName+'</option>')
            });
        }, 'json');
    });
});

/**
 |--------------------------------------------------------
 | Section for the show and hide of the payment method
 |--------------------------------------------------------
 */
function show(target,trigger)
{
if (document.getElementById(target).style.display=='none') 
    {
      document.getElementById(target).style.display = 'block';  
      trigger.html("basdfsf");
    }
    else
    {
      document.getElementById(target).style.display = 'none';
    };

}
function hide(target,trigger)
{
document.getElementById(target).style.display = 'none';
}